<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Classification;
use App\Models\Document;
use App\Models\Attachment;
use App\Models\DocumentRecipient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Notifications\DocumentNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Models\UserActivity;


class IncomingController extends Controller
{
   //
   public function incomingPage(Request $request)
   {
      $userId = auth()->id();

      // Get the current page (default to 1 if not present)
      // $page = $request->input('page', 1);
      // Define the number of items per page
      // $perPage = 10;
      // Calculate the offset
      // $offset = ($page - 1) * $perPage;

      // Fetch documents where the logged-in user is a recipient
      // $incomingDocuments = Document::whereHas('recipients', function ($query) {
      //    $query->where('recipient_id', auth()->id());
      // })->with(['sender', 'attachments'])->paginate(10)->appends(request()->query());

      $incomingDocuments = Document::whereHas('recipients', function ($query) {
         $query->where('recipient_id', auth()->id());
      })->with(['sender', 'attachments'])->paginate(7);

      // Get the total count of items to calculate total pages
      $totalItems = Document::whereHas('recipients', function ($query) {
         $query->where('recipient_id', auth()->id());
      })->count();


      //fetch and count all incoming documents to loggedin user
      $countIncoming = Document::whereHas('recipients', function ($query) {
         $query->where('recipient_id', auth()->id());
      })->with(['sender', 'attachments'])->count();

      // Fetch and count  documents where the user is the sender
      $countOutgoing = Document::where('status', 'Released')->count();

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

      // Count all priority
      $urgentCount = Document::where('priority', 'Urgent')->count();
      $usualCount = Document::where('priority', 'Usual')->count();


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
         'totalItems',
         'urgentCount',
         'usualCount'
      ));
   }

   // Download the attach file in modal Incoming page
   public function download($id)
   {
      $attachment = Attachment::findOrFail($id);
      return response()->download(storage_path("app/public/{$attachment->file_path}"), $attachment->file_name);
   }

   // public function upload(Request $request, $documentId)
   // {
   //    $request->validate([
   //       'attachment' => 'required|file|max:10000', // 2MB limit
   //    ]);

   //    $file = $request->file('attachment');
   //    $path = $file->store('attachments', 'public');

   //    $attachment = Attachment::create([
   //       'document_id' => $documentId,
   //       'file_path' => $path,
   //       'file_name' => $file->getClientOriginalName(),
   //       'file_type' => $file->getMimeType(),
   //    ]);

   //    return back()->with('success', 'File uploaded successfully.');
   // }

   // attaching new file in modal (Attachment section)
   public function upload(Request $request, $documentId)
   {
      $request->validate([
         'attachment' => 'required|file|max:10048' // Adjust file size as needed
      ]);

      $document = Document::findOrFail($documentId);
      $file = $request->file('attachment');
      $filePath = $file->store('attachments', 'public');

      $attachment = new Attachment();
      $attachment->document_id = $document->id;
      $attachment->file_name = $file->getClientOriginalName();
      $attachment->file_path = $filePath;
      $attachment->file_type = $this->getFileTypeDescription($file->getMimeType()); //Extract MIME type and store it

      $attachment->save();

      // return response()->json([
      //    'success' => true,
      //    'attachment' => [
      //       'file_name' => $attachment->file_name,
      //       'file_url' => asset('storage/' . $attachment->file_path),
      //       'download_url' => route('download.attachment', $attachment->id)
      //    ]
      // ]);

      // Return only the new attachment HTML
      return view('partials.attachment-item', compact('attachment'))->render();
   }

   /**
    * Convert MIME type to a simple file type description
    */
   private function getFileTypeDescription($mime)
   {
      $map = [
         'image/jpeg' => 'JPEG Image',
         'image/png' => 'PNG Image',
         'image/gif' => 'GIF Image',
         'application/pdf' => 'PDF Document',
         'application/msword' => 'Word Document',
         'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'Word Document',
         'application/vnd.ms-excel' => 'Excel Spreadsheet',
         'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'Excel Spreadsheet',
         'application/vnd.ms-powerpoint' => 'PowerPoint Presentation',
         'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'PowerPoint Presentation',
         'text/plain' => 'Text File',
         'application/zip' => 'ZIP Archive',
         'application/x-rar-compressed' => 'RAR Archive',
      ];

      return $map[$mime] ?? 'Unknown File Type';
   }

   // function for releasing document in incoming page (only Admin/Records)
   public function releaseDocument($document_code)
   {
      $document = Document::where('document_code', $document_code)->first();
      if (!$document) {
         return response()->json(['success' => false, 'message' => 'Document not found.'], 404);
      }

      // Update document status
      $document->status = 'Released';
      $document->save();

      return response()->json(['success' => true, 'message' => 'Document released successfully']);
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
         'file.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:10208', // MB in KB

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

      // Log user activity 📌
      // UserActivity::create([
      //    'user_id' => auth()->id(), // The user who uploaded
      //    'action' => 'Uploaded a new document',
      //    'document_id' => $document->id, // Link to the uploaded document
      // ]);
      UserActivity::create([
         'user_id' => auth()->id(),
         'document_id' => $document->id,
         'action' => 'Uploaded a document',
      ]);



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

      // Notify recipients in gmail
      $users = User::whereIn('id', $recipients)->get(); // Retrieve User models
      foreach ($users as $user) {
         $user->notify(new DocumentNotification($document));
      }

      if (!empty($request->recipient) && is_array($request->recipient)) {
         foreach ($request->recipient as $recipient) {
            // Save each recipient
            DocumentRecipient::create([
               'document_id' => $document->id,
               'recipient_id' => $recipient,
            ]);

            // ✅ Store notification in the custom notifications table
            DB::table('notification')->insert([
               'document_id' => $document->id,
               'recipient_id' => $recipient,
               'message' => "New document received: " . $document->subject, // Ensure 'subject' exists
               'read_at' => null, // Unread notification
               'created_at' => now(),
               'updated_at' => now(),
            ]);
         }
      } else {
         return response()->json(['error' => 'No recipients provided'], 400);
      }

      return response()->json(['message' => 'Document created successfully.'], 200);
   }

   public function getActivityLogs()
   {
      $logs = DB::table('user_activities')
         ->join('users', 'user_activities.user_id', '=', 'users.id')
         ->select('users.name', 'user_activities.action', 'user_activities.created_at')
         ->orderBy('user_activities.created_at', 'desc')
         ->limit(10) // Adjust as needed
         ->get();

      return response()->json($logs);
   }

   // Delete the attach file in modal (attachment section)
   public function destroy($id)
   {
      $attachment = Attachment::findOrFail($id);

      // Delete the file from storage
      Storage::delete('public/' . $attachment->file_path);
      if (!$attachment) {
         return response()->json(['message' => 'Attachment not found.'], 404);
      }

      // Remove the record from the database
      $attachment->delete();

      return redirect()->back()->with('success', 'Attachment deleted successfully.');
   }
}
