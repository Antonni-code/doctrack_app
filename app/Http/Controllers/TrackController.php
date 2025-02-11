<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;

class TrackController extends Controller
{
   //
   public function trackpage()
   {
      session()->forget('documentCode'); // Clear the stored document code
      return view('trackview', [
         'document' => null,
         'sender' => null,
         'recipients' => null,
         'documentCode' => null,
      ]);
   }

   // public function search(Request $request)
   // {
   //    $documentCode = $request->input('track'); // Get the document code from input
   //    $document = Document::where('document_code', $documentCode)->first(); // Find the document by code

   //    if (!$document) {
   //       return back()->with('error', 'Document not found!');
   //    }

   //    // Get sender and recipients
   //    $sender = User::find($document->sender_id);
   //    $recipients = $document->recipients()->get(); // Assuming you have a relationship for recipients

   //    return view('trackview', compact('document', 'sender', 'recipients')); // Same view
   // }

   public function search(Request $request)
   {

      $documentCode = $request->input('track'); // Get the document code from input

      $document = Document::where('document_code', $documentCode)->first(); // Find document

      if (!$document) {
         return redirect()->route('trackpage')->with('error', 'Document not found!');
      }

      // Store document code in session so it persists after page reload
      session(['documentCode' => $documentCode]);

      // Get sender and recipients
      $sender = User::find($document->sender_id);
      // Get recipients through the DocumentRecipient model
      $recipients = $document->recipients()->with('recipient')->get();

      // $recipients = Document::whereHas('recipients', function ($query) {
      //    $query->where('recipient_id', auth()->id());
      // })->get();


      return view('trackview', compact('document', 'sender', 'recipients', 'documentCode'));
   }
}
