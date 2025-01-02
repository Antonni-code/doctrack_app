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
         ->get();

      return view('outgoing', compact('outgoingDocuments'));
   }
}
