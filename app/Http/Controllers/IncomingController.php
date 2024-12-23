<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classification;

class IncomingController extends Controller
{
   //
   public function incoming()
   {
      // Fetch classifications and their sub-classifications from the database
      $classifications = Classification::all(); // Or customize as needed
      // Fetch users from the database (you can customize this query as needed)
      $users = User::all(); // Or use any query to get the users you need

      // Return the view with classifications and users data
      return view('dashboard', compact('classifications', 'users'));
   }
}
