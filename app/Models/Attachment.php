<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
   protected $fillable = ['document_id', 'file_path', 'file_name', 'file_type'];

   // Relationship to document
   public function document()
   {
      return $this->belongsTo(Document::class);
   }
}
