<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   use HasFactory;

   // Define the fillable attributes for mass-assignment protection
   protected $fillable = [
      'document_code',
      'sender_id',
      'subject',
      'brief_description',
      'detailed_description',
      'action',
      'priority',
      'letter_date',
      'deadline_date',
      'classification',
      'sub_classification',
      'reference',
      'file_path'
   ];


   //Relationship to sender (user)
   public function sender()
   {
      return $this->belongsTo(User::class, 'sender_id');
   }

   // Recipients relationship (one-to-many through the DocumentRecipient model)
   public function recipients()
   {
      return $this->hasMany(DocumentRecipient::class);
   }

   public function attachments()
   {
      return $this->hasMany(Attachment::class);
   }
}
