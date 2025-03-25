<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
   public function store(Request $request)
   {
      // Validate the login credentials
      $credentials = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required'],
      ]);

      // Find the user by email
      $user = \App\Models\User::where('email', $credentials['email'])->first();

      // Check if the user is excluded
      if ($user && $user->excluded == 1) {
         return back()->withErrors(['email' => 'Your account is excluded. Please contact the administrator.']);
      }

      // Attempt login
      if (Auth::attempt($credentials)) {
         // Regenerate the session
         $request->session()->regenerate();

         // Redirect to the intended page or dashboard
         return redirect()->intended('/dashboard/incoming');
      }

      // If authentication fails
      return back()->withErrors([
         'email' => 'The provided credentials do not match our records.',
      ]);
   }
}
