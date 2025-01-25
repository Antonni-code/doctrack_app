<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Classification;
use App\Models\Document;
use App\Models\DocumentRecipient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Notifications\DocumentNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class IncomingController extends Controller
{
   //
   public function incoming()
   {
      $userId = auth()->id();

      // Fetch documents where the logged-in user is a recipient
      $incomingDocuments = Document::whereHas('recipients', function ($query) {
         $query->where('recipient_id', auth()->id());
      })->with(['sender', 'attachments'])->get();

      //fetch and count all incoming documents to loggedin user
      $countIncoming = Document::whereHas('recipients', function ($query) {
         $query->where('recipient_id', auth()->id());
      })->with(['sender', 'attachments'])->count();

      // Fetch and count  documents where the user is the sender
      $countOutgoing = Document::where('sender_id', $userId)
         ->with(['recipients', 'attachments'])
         ->count();

      $countPending = Document::where('status', 'Pending')->count();

      // Fetch classifications from the database and group by name
      $classifications = Classification::all()->groupBy('name');

      // Fetch users from the database, excluding those marked as 'excluded' or inactive
      $users = User::where('excluded', 0)->where('active', 1)->get();

      // Fetch users and count all active users
      $activeUsers  = User::where('excluded', 0)->where('active', 1)->count();

      // Fetch users and count all active users
      $excludedUsers  = User::where('excluded', 1)->where('active', 0)->count();

      // Generate a random document code
      $documentCode = $this->generateDocumentCode();

      // Get the logged-in user
      $loggedInUser = auth()->user();

      // Return the view with classifications, users, document code, and logged-in user
      return view('dashboard', compact(
         'classifications',
         'users',
         'documentCode',
         'loggedInUser',
         'incomingDocuments',
         'activeUsers',
         'excludedUsers',
         'countIncoming',
         'countOutgoing',
         'countPending',
      ));
   }

   // Helper to generate unique random number for Document code
   private function generateDocumentCode()
   {
      $year = date('Y'); // Current year
      $prefix = 'DOC';
      $randomCode = mt_rand(10000, 99999); // Random number between 10000 and 99999
      return "{$prefix}-{$year}-{$randomCode}";
   }

   // select2 library
   public function searchUsers(Request $request)
   {
      $query = $request->input('q'); // Get the search term from the request

      $users = User::where('excluded', 0)
         ->where('active', 1)
         ->where('name', 'LIKE', "%{$query}%") // Filter users by name based on the search term
         ->get();

      // Return a JSON response in the format Select2 expects
      return response()->json(
         $users->map(function ($user) {
            return [
               'id' => $user->id,
               'text' => $user->name, // Select2 requires 'text' key for display
            ];
         })
      );
   }

   public function fetchSubClassifications(Request $request)
   {
      $classification = $request->input('classification');

      if (!$classification) {
         return response()->json([]);
      }

      try {
         // Correct table name
         $subClassifications = DB::table('classifications') // Updated table name
            ->where('name', $classification)
            ->pluck('sub_class');

         return response()->json($subClassifications);
      } catch (\Exception $e) {
         // Log the error for debugging
         \Log::error('Error fetching sub-classifications: ' . $e->getMessage());
         return response()->json(['error' => 'Server Error'], 500);
      }
   }

   public function store(Request $request)
   {
      // Validation
      $validated = $request->validate([
         'document_code' => 'required|unique:documents', // Ensure the document code is unique
         // 'sender_id' => 'required|integer|exists:users,id',
         'sender_id' => [
            'required',
            'integer',
            'exists:users,id',
         ],
         'recipient' => 'required|array|min:1',
         // 'recipient.*' => 'required|integer|exists:users,id',
         'recipient.*' => [
            'required',
            'integer',
            'exists:users,id',
         ],
         'subject' => 'required|string|max:255',
         'classification' => 'required|string',
         'sub_classification' => 'required |string',
         'action' => 'required|string',
         'priority' => 'required|string',
         'deadline_date' => 'required|date_format:m/d/Y', // Accepts the user-provided format
         'letter_date' => 'required|date_format:m/d/Y',
         'delivery_type' => 'required|string',
         'reference' => 'nullable|string',
         'brief_description' => 'nullable|string',  // Brief description of the document
         'detailed_description' => 'nullable|string', // Detailed description for attachments
         'file' => 'required|array',
         'file.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:768000', // 750MB in KB

      ]);

      // Ensure recipients are integers
      $request->merge([
         'recipient' => array_map('intval', $request->recipient),
      ]);

      // Format the dates to MySQL's expected format (YYYY-MM-DD)
      $formattedDeadlineDate = $request->deadline_date ? Carbon::createFromFormat('m/d/Y', $request->deadline_date)->format('Y-m-d') : null;
      $formattedLetterDate = $request->letter_date ? Carbon::createFromFormat('m/d/Y', $request->letter_date)->format('Y-m-d') : null;

      // Save document
      $document = new Document();
      $document->document_code = $request->document_code;
      $document->sender_id = $request->sender_id;
      $document->classification = $request->classification;
      $document->sub_classification = $request->sub_classification;
      $document->subject = $request->subject;
      $document->action = $request->action;
      $document->priority = $request->priority;
      $document->deadline_date = $formattedDeadlineDate; // Store in correct format
      $document->letter_date = $formattedLetterDate; // Store in correct format
      $document->delivery_type = $request->delivery_type;
      $document->reference = $request->reference;
      $document->brief_description = $request->brief_description;  // Save brief description
      $document->detailed_description = $request->detailed_description;  // Save detailed description
      $document->status = 'Pending'; // Set default status

      // Save document record
      $document->save();


      // Handle file uploads
      if ($request->hasFile('file')) {
         foreach ($request->file('file') as $file) {
            // Store the file in the 'documents' directory within the 'public' disk
            $filePath = $file->store('documents', 'public');

            // Get the original file name
            $fileName = $file->getClientOriginalName();

            // Get the file MIME type
            $fileType = $file->getMimeType();

            // Map MIME type to a simpler description
            $simpleFileType = match ($fileType) {
               'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'Word Document',
               'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'Excel Spreadsheet',
               'application/vnd.ms-excel' => 'Excel Spreadsheet (Legacy)',
               'application/pdf' => 'PDF Document',
               'image/jpeg' => 'JPEG Image',
               'image/png' => 'PNG Image',
               default => $fileType, // Fallback to original MIME type
            };

            // Save the attachment record
            $document->attachments()->create([
               'file_path' => $filePath,
               'file_name' => $fileName, // Add file name here
               'file_type' => $simpleFileType, // Store the file type here
            ]);
         }
      }

      // Save recipients (ensure no duplicates)
      $recipients = array_unique($request->recipient); // Remove duplicates
      foreach ($recipients as $recipientId) {
         $document->recipients()->create(['recipient_id' => $recipientId]);
      }

      // Notify recipients
      $users = User::whereIn('id', $recipients)->get(); // Retrieve User models
      foreach ($users as $user) {
         $user->notify(new DocumentNotification($document));
      }

      return response()->json(['message' => 'Document created successfully.'], 200);
   }
}
