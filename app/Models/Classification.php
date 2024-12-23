<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classification extends Model
{
   use HasFactory;

   protected $fillable = ['name', 'sub_class'];

   // An classification can have many Documents
}
