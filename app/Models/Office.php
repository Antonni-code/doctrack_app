<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
   use HasFactory;

   protected $fillable = ['name', 'location', 'code'];

   // An office can have many users
   public function users()
   {
      return $this->hasMany(User::class);
   }
}
