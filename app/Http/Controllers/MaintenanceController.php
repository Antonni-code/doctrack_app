<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class MaintenanceController extends Controller
{
   // Sub Category
   public function subcategory()
   {
      return view('maintenance.sub-category');
   }

   // Offices
   public function offices()
   {
      $offices = Office::all();
      return view('maintenance.offices', compact('offices'));
   }

   // Store Office
   public function storeOffice(Request $request)
   {
      try {
         $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
         ]);

         // Create a new office
         $newOffice = new Office();
         $newOffice->name = strtoupper($request->input('name'));
         $newOffice->location = strtoupper($request->input('location'));
         $newOffice->code = $request->input('code') ?? null;

         $newOffice->save();

         // Redirect back to the offices page with a success message
         return redirect()->route('offices') // Or another route as needed
            ->with('success', 'Office created successfully!');
      } catch (\Throwable $e) {
         // Handle errors and redirect back with an error message
         return redirect()->route('offices') // Or another route as needed
            ->with('error', 'Failed to create office: ' . $e->getMessage());
      }
   }


   // Get Office Details
   public function getOffice($id)
   {
      $office = Office::findOrFail($id);
      return response()->json($office);
   }

   // Update Office
   public function updateOffice(Request $request, $id)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'location' => 'nullable|string|max:255',
         'code' => 'nullable|string|max:255',
      ]);

      $office = Office::findOrFail($id);
      $office->name = $request->name;
      $office->location = $request->location;
      $office->code = $request->code;
      $office->save();

      return response()->json(['message' => 'Office updated successfully']);
   }

   // Delete Office
   public function deleteOffice($id)
   {
      $office = Office::findOrFail($id);
      $office->delete();

      return response()->json(['message' => 'Office deleted successfully']);
   }
}
