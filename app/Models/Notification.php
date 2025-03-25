<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   use HasFactory;

   protected $fillable = [
      'document_id',
      'recipient_id',
      'message',
      'read_at'
   ];

   public function document()
   {
      return $this->belongsTo(Document::class);
   }

   public function recipient()
   {
      return $this->belongsTo(DocumentRecipient::class, 'recipient_id');
   }
}
