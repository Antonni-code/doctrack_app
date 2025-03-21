<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Document;

class DocumentNotification extends Notification
{
   use Queueable;

   /**
    * Create a new notification instance.
    */
   public $document;
   public function __construct($document)
   {
      $this->document = $document;
   }

   /**
    * Get the notification's delivery channels.
    *
    * @return array<int, string>
    */
   public function via(object $notifiable): array
   {
      return ['mail'];
   }

   /**
    * Get the mail representation of the notification.
    */
   public function toMail(object $notifiable): MailMessage
   {
      return (new MailMessage)
         ->subject('New Document Notification')
         ->greeting('Hello, ' . $notifiable->name)
         ->line('You have been sent a new document.')
         ->line('Document Code: ' . $this->document->document_code)
         ->line('Subject: ' . $this->document->subject)
         ->line('Priority: ' . $this->document->priority)
         ->action('View Document', url('/documents/' . $this->document->id))
         ->line('Thank you for using our system!');
   }

   /**
    * Get the array representation of the notification.
    *
    * @return array<string, mixed>
    */
   public function toArray(object $notifiable): array
   {
      return [
         'document_id' => $this->document->id,
         'sender_id' => $this->document->sender_id,
         'message' => "You received a new document from {$this->document->sender->name}.",
      ];
   }
}
