<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
   /**
    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
   public function handle(Request $request, Closure $next, $role): Response
   {
      if (!Auth::check()) {
         return redirect('/login'); // Redirect if not authenticated
      }

      // if (Auth::user()->role !== $role) {
      //    abort(403, 'Unauthorized Access'); // Restrict access
      // }
      if (Auth::user()->role !== $role) {
         // Prevent navigation by returning a response that does nothing
         return response('', 204); // No content response (prevents redirect)
      }

      return $next($request);
   }
}
