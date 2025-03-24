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
      // $userId = auth()->id();

      // $outgoingDocuments = Document::with('recipients.recipient')
      // ->where('status', 'Released')
      // ->latest()
      // ->paginate(7);

      $user = auth()->user(); // Get authenticated user

      $query = Document::with('recipients.recipient')
         ->where('status', 'Released')
         ->latest();

      // If the user is a staff, show only documents they created
      if ($user->role === 'staff') {
         $query->where('sender_id', $user->id);
      }

      $outgoingDocuments = $query->paginate(7);

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
