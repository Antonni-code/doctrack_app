<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GmailController extends Controller
{

   protected $credentialsPath;

   public function __construct()
   {
      $this->credentialsPath = storage_path('app/credentials.json');
   }
   public function gmail()
   {
      return view('gmail');
   }
}
