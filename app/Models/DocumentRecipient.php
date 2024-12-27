<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentRecipient extends Model
{
   use HasFactory;

   // Define the fillable attributes for mass-assignment protection
   protected $fillable = [
      'document_id',
      'recipient_id',
   ];

   // Relationship to document
   public function document()
   {
      return $this->belongsTo(Document::class);
   }

   // Relationship to recipient (user)
   public function recipient()
   {
      return $this->belongsTo(User::class, 'recipient_id');
   }
}
