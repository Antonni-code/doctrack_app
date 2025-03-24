<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentRecipient;


class MailSentController extends Controller
{
   //
   public function mailsent(Request $request)
   {
      $userId = auth()->id();

      // Fetch documents where the user is the sender
      $mailSent = Document::where('sender_id', $userId)
         ->with(['recipients', 'attachments'])->paginate(13);

      return view('mail', compact('mailSent'));
   }

   // Delete classification
   public function deleteMails($id)
   {
      try {
         $delete_docs = Document::findOrFail($id);
         $delete_docs->delete();

         return response()->json(['message' => 'Document deleted successfully!']);
      } catch (\Throwable $e) {
         return response()->json(['error' => 'Failed to delete Document: ' . $e->getMessage()], 500);
      }
   }
}
