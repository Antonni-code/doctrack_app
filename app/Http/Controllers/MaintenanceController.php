<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Classification;
use App\Http\Controllers\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
   // Sub Category
   public function subcategory(Request $request)
   {
      // $categories = Classification::all();
      // Define the number of items per page
      // $perPage = 10;

      // Get the current page (default to 1 if not present)
      // $page = $request->input('page', 1);

      // Calculate the offset
      // $offset = ($page - 1) * $perPage;

      // Fetch the categories with skip and take
      // $categories = Classification::skip($offset)->take($perPage)->get();
      $categories = Classification::paginate(7);

      // Get the total count of items to calculate total pages
      // $totalItems = Classification::count();
      // $totalPages = ceil($totalItems / $perPage);
      return view('maintenance.sub-category', compact('categories'));
   }

   public function storeclass(Request $request)
   {
      try {
         $request->validate([
            'name' => 'required|string|max:255',
            'sub_class' => 'nullable|string|max:255',
         ]);

         // Create a new office
         $newClass = new Classification();
         $newClass->name = strtoupper($request->input('name'));
         $newClass->sub_class = strtoupper($request->input('sub_class'));

         $newClass->save();

         // Redirect back to the offices page with a success message
         return redirect()->route('subcategory') // Or another route as needed
            ->with('success', 'Classification created successfully!');
      } catch (\Throwable $e) {
         // Handle errors and redirect back with an error message
         return redirect()->route('subcategory') // Or another route as needed
            ->with('error', 'Failed to create Classification: ' . $e->getMessage());
      }
   }

   // Update classification
   public function updateclass(Request $request, $id)
   {
      try {
         $request->validate([
            'name' => 'required|string|max:255',
            'sub_class' => 'nullable|string|max:255',
         ]);

         $classification = Classification::findOrFail($id);
         $classification->name = strtoupper($request->input('name'));
         $classification->sub_class = strtoupper($request->input('sub_class'));
         $classification->save();

         return response()->json(['message' => 'Classification updated successfully!']);
      } catch (\Throwable $e) {
         return response()->json(['error' => 'Failed to update Classification: ' . $e->getMessage()], 500);
      }
   }

   // Delete classification
   public function deleteclass($id)
   {
      try {
         $classification = Classification::findOrFail($id);
         $classification->delete();

         return response()->json(['message' => 'Classification deleted successfully!']);
      } catch (\Throwable $e) {
         return response()->json(['error' => 'Failed to delete Classification: ' . $e->getMessage()], 500);
      }
   }

   // Offices
   public function offices()
   {
      // $offices = Office::all();
      $offices = Office::paginate(7); // 5 items per page
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
