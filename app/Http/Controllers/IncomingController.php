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

      // Fetch classifications from the database and group by name
      $classifications = Classification::all()->groupBy('name');

      // Fetch users from the database, excluding those marked as 'excluded' or inactive
      $users = User::where('excluded', 0)->where('active', 1)->get();

      // Generate a random document code
      $documentCode = $this->generateDocumentCode();

      // Get the logged-in user
      $loggedInUser = auth()->user();

      // Return the view with classifications, users, document code, and logged-in user
      return view('dashboard', compact('classifications', 'users', 'documentCode', 'loggedInUser', 'incomingDocuments'));
   }

   // Helper to generate unique random number for Document code
   private function generateDocumentCode()
   {
      $year = date('Y'); // Current year
      $prefix = 'DOC';
      $randomCode = mt_rand(10000, 99999); // Random number between 10000 and 99999
      return "{$prefix}-{$year}-{$randomCode}";
   }


   // public function store(Request $request)
   // {
   //    try {
   //       // Validate the incoming request data
   //       $validatedData = $request->validate([
   //          'sender_id' => 'required|exists:users,id',
   //          'recipient' => 'required|array',
   //          'recipient.*' => 'exists:users,id',
   //          'classification' => 'required|string|max:255',
   //          'sub_classification' => 'required|string|max:255',
   //          'subject' => 'required|string|max:255',
   //          'action' => 'required|string|max:255',
   //          'deadline_date' => 'required|date',
   //          'delivery_type' => 'required|string|max:255',
   //          'reference' => 'nullable|string|max:255',
   //          'brief_description' => 'required|string', // For brief description of the document
   //          'detailed_description' => 'required|string', // For detailed description or attachments
   //          'priority' => 'required|string|max:255',
   //          'letter_date' => 'required|date',
   //          'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,png,jpeg|max:10240',
   //          'document_code' => 'required|string|unique:documents,document_code',
   //       ]);

   //       // Log the incoming request data to ensure it's being passed correctly
   //       Log::info('Document store data:', $request->all());



   //       // Create a new document record in the database
   //       $document = Document::create([
   //          'document_code' => $request->document_code,
   //          'sender_id' => $request->sender_id,
   //          'classification' => $request->classification,
   //          'sub_classification' => $request->sub_classification,
   //          'subject' => $request->subject,
   //          'brief_description' => $request->brief_description,
   //          'priority' => $request->priority,
   //          'letter_date' => $request->letter_date,
   //          'action' => $request->action,
   //          'deadline_date' => $request->deadline_date,
   //          'delivery_type' => $request->delivery_type,
   //          'reference' => $request->reference,
   //          'detailed_description' => $request->detailed_description,
   //          // Handle file upload
   //          'file_path' => $request->hasFile('file') ? $request->file('file')->store('documents') : null,
   //       ]);

   //       $document->save();

   //       // Save recipients in the document_recipients table
   //       foreach ($validatedData['recipient'] as $recipientId) {
   //          DocumentRecipient::create([
   //             'document_id' => $document->id,
   //             'recipient_id' => $recipientId,
   //          ]);
   //       }
   //       dd($request->all());

   //       // Return a success response
   //       return redirect()->route('dashboard')
   //          ->with('success', 'Document created successfully!');
   //    } catch (\Throwable $e) {
   //       // Handle errors
   //       return redirect()->route('dashboard')
   //          ->with('error', 'Failed to create Document: ' . $e->getMessage());
   //    }
   // }

   // public function store(Request $request)
   // {
   //    Log::info('Document data:', $request->all());

   //    try {
   //       // Validate incoming data
   //       $request->validate([
   //          'document_code' => 'required|string|unique:documents,document_code',
   //          'sender_id' => 'required|exists:users,id',
   //          'recipient' => 'required|array',
   //          'recipient.*' => 'exists:users,id',
   //          'subject' => 'required|string',
   //          'classification' => 'required|string',
   //          'sub_classification' => 'required|string',
   //          'action' => 'required|string',
   //          'deadline_date' => 'nullable|date',
   //          'delivery_type' => 'nullable|string',
   //          'reference' => 'nullable|string',
   //          'brief_description' => 'nullable|string',
   //          'detailed_description' => 'nullable|string',
   //          'priority' => 'required|string',
   //          'letter_date' => 'required|date',
   //          'file' => 'nullable|file',
   //       ]);
   //       // Manually create a new document
   //       $document = new Document();
   //       $document->document_code = $request->input('document_code');
   //       $document->sender_id = $request->input('sender_id');
   //       $document->classification = strtoupper($request->input('classification'));
   //       $document->sub_classification = strtoupper($request->input('sub_classification'));
   //       $document->subject = $request->input('subject');
   //       $document->brief_description = $request->input('brief_description');
   //       $document->priority = $request->input('priority');
   //       $document->letter_date = $request->input('letter_date');
   //       $document->action = $request->input('action');
   //       $document->deadline_date = $request->input('deadline_date');
   //       $document->delivery_type = $request->input('delivery_type');
   //       $document->reference = $request->input('reference');
   //       $document->detailed_description = $request->input('detailed_description');

   //       // Handle the file upload if present
   //       if ($request->hasFile('file')) {
   //          $document->file_path = $request->file('file')->store('public/documents');
   //       }

   //       // Save the document
   //       $document->save();

   //       // Insert each recipient into the document_recipients table
   //       foreach ($request->recipient as $recipientId) {
   //          $documentRecipient = new DocumentRecipient();
   //          $documentRecipient->document_id = $document->id;
   //          $documentRecipient->recipient_id = $recipientId;
   //          $documentRecipient->save();
   //       }

   //       // Return a success message as JSON
   //       return response()->json(['message' => 'Document sent successfully!']);
   //    } catch (\Throwable $e) {
   //       // Return an error message if something goes wrong
   //       return response()->json(['error' => 'Failed to send the document: ' . $e->getMessage()]);
   //    }
   // }

   public function store(Request $request)
   {
      // Validation
      $request->validate([
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
         'file.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048', // File validation
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


      // Attach file if provided
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

      return response()->json(['message' => 'Document created successfully.'], 200);
   }
}
