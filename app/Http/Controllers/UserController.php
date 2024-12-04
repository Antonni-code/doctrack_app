<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
   //
   public function usermanagement()
   {
      // Check if the authenticated user is an admin
      if (Auth::check() && Auth::user()->role !== 'admin') {
         abort(404); // Show a 404 page for non-admin users
      }

      $users = User::all();
      return view('user-management', compact('users'));
   }

   // create user
   public function store(Request $request)
   {
      try {
         // Validate the request
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,staff',
            'office' => 'nullable|string',
            'designation' => 'nullable|string',
         ]);

         // Check for an existing user with the same name or email
         $existingUser = User::where('name', $validated['name'])
            ->orWhere('email', $validated['email'])
            ->first();

         if ($existingUser) {
            return response()->json([
               'message' => 'User with this name or email already exists.',
               'error' => 'Duplicate user data',
            ], 409); // Conflict status code
         }

         // Check for the lowest available excluded user ID
         $excludedUser = User::excluded()->orderBy('id', 'asc')->first();

         if ($excludedUser) {
            // Reuse the excluded user's ID by updating their details
            $excludedUser->update([
               'name' => $validated['name'],
               'email' => $validated['email'],
               'password' => Hash::make($validated['password']),
               'role' => $validated['role'],
               'office' => $validated['office'] ?? null,
               'designation' => $validated['designation'] ?? null,
               'active' => 1, // Mark as active
               'excluded' => 0, // Remove excluded status
               'created_at' => now(), // Update the created date to the current timestamp
            ]);
            $excludedUser->active = 1;
            $excludedUser->excluded = 0;
            $excludedUser->save();


            return response()->json([
               'message' => 'User created successfully using a recycled ID!',
               'user' => $excludedUser,
            ], 201);
         }

         // If no excluded user is found, create a new user
         $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'office' => $validated['office'] ?? null,
            'designation' => $validated['designation'] ?? null,
            'active' => 1, // Default: active
            'excluded' => 0, // Default: not excluded
         ]);

         return response()->json([
            'message' => 'User created successfully!',
            'user' => $user,
         ], 201);
      } catch (\Exception $e) {
         // Handle errors and return as JSON
         return response()->json([
            'message' => 'Failed to create user.',
            'error' => $e->getMessage(),
         ], 500);
      }
   }

   // delete user
   public function softDelete($id)
   {
      Log::info('Request Method: ' . request()->method());
      $user = User::find($id);

      if (!$user) {
         return redirect()->back()->with('error', 'User not found.');
      }

      $user->active = 0; // Deactivate user
      $user->excluded = 1; // Mark as excluded
      $user->save();

      return redirect()->back()->with('success', 'User excluded successfully.');
   }

   //reactivate user
   public function restore($id) // Restore soft deleted record
   {
      try {
         // Retrieve the record by ID where the excluded status is true
         $user = User::where('id', $id)
            ->where('excluded', 1) // Check if the record is excluded
            ->firstOrFail();

         // Update the active and excluded fields
         $user->active = 1;   // Mark as active
         $user->excluded = 0; // Mark as not excluded
         $user->save(); // Save the changes

         // Log the activity
         // Activity::create([
         //    'user_id' => Auth::id(),
         //    'action' => 'restore',
         //    'description' => 'Restored record with ID ' . $record->id
         // ]);

         return response()->json([
            'message' => 'User restored successfully!',
            'user' => $user,
         ], 201);
      } catch (\Exception $e) {
         return response()->json([
            'message' => 'Failed to create user.',
            'error' => $e->getMessage(),
         ], 5000);
      }
   }

   // Show the edit form
   // public function edit($id)
   // {
   //    // Find the user by ID
   //    $user = User::findOrFail($id);

   //    // Return the edit view with user data
   //    return view('users.edit', compact('user'));
   // }

   // Handle the form submission
   public function update(EditUserRequest $request, $id)
   {
      try {
         // Fetch the user by ID
         $user = User::findOrFail($id);

         // Update the user with validated data
         $user->name = $request->editName; // Update the name
         $user->email = $request->editEmail; // Update the email
         $user->role = $request->editRole; // Update the role
         $user->office = $request->editOffice; // Update the office
         $user->designation = $request->editDesignation; // Update the designation

         // Update the password only if provided
         if ($request->filled('editPassword')) {
            $user->password = Hash::make($request->editPassword);
         }

         // Save the updated record
         $user->save();

         return redirect()->back()->with('success', 'User updated successfully!');
      } catch (\Exception $e) {
         return redirect()->route('usermanagement')->with('fail', $e->getMessage());
      }
   }
}
