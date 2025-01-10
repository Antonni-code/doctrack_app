<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PreventExcludedUsers
{
   /**
    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
   public function handle(Request $request, Closure $next): Response
   {
      if (Auth::check() && Auth::user()->excluded) {
         Auth::logout();
         return redirect('/login')->withErrors(['email' => 'Your account is excluded.']);
      }

      return $next($request);
   }
}
