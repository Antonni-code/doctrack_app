<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentRecipient;

class OutgoingController extends Controller
{
   //
   public function outgoing()
   {
      $userId = auth()->id();

      // Fetch documents where the user is the sender
      $outgoingDocuments = Document::where('sender_id', $userId)
         ->with(['recipients', 'attachments'])
         ->paginate(10);

      return view('outgoing', compact('outgoingDocuments'));
   }

   // Delete classification
   public function deleteDocs($id)
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
