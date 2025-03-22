<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentMail extends Mailable
{
   use Queueable, SerializesModels;

   /**
    * Create a new message instance.
    */
   public $document;
   public function __construct($document)
   {
      $this->document = $document;
   }

   /**
    * Get the message envelope.
    */
   public function envelope(): Envelope
   {
      return new Envelope(
         subject: 'Document Mail',
      );
   }

   /**
    * Get the message content definition.
    */
   public function content(): Content
   {
      return new Content(
         view: 'emails.document',  // Replace 'emails.document' with the actual Blade file path
         with: ['document' => $this->document],
      );
   }

   /**
    * Get the attachments for the message.
    *
    * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    */
   public function attachments(): array
   {
      return [];
   }
}
