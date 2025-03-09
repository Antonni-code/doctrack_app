<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Models\User;


class DashboardController extends Controller
{
   public function dashboard()
   {
      return view('dash-board');
   }

   // public function getChartData()
   // {
   //    // Document Status Overview
   //    $documentStatus = Document::selectRaw("status, COUNT(*) as count")
   //       ->groupBy('status')
   //       ->pluck('count', 'status')
   //       ->toArray();

   //    // Documents Processed Per Office
   //    $documentsPerOffice = Document::join('offices', 'documents.office_id', '=', 'offices.id')
   //       ->selectRaw("offices.name as office, COUNT(documents.id) as count")
   //       ->groupBy('offices.name')
   //       ->pluck('count', 'office')
   //       ->toArray();

   //    // Documents Per Month
   //    $documentsPerMonth = Document::selectRaw("DATE_FORMAT(created_at, '%b') as month, COUNT(*) as count")
   //       ->groupBy('month')
   //       ->pluck('count', 'month')
   //       ->toArray();

   //    // Average Processing Time
   //    $averageProcessingTime = Document::selectRaw("office_id, AVG(DATEDIFF(updated_at, created_at)) as avg_time")
   //       ->join('offices', 'documents.office_id', '=', 'offices.id')
   //       ->groupBy('offices.name')
   //       ->pluck('avg_time', 'offices.name')
   //       ->toArray();

   //    // User Activity Logs
   //    $activityLogs = User::select("user_name as user", "action", "created_at as timestamp")
   //       ->latest()
   //       ->limit(10)
   //       ->get();

   //    return response()->json([
   //       "documentStatus" => ["labels" => array_keys($documentStatus), "values" => array_values($documentStatus)],
   //       "documentsPerOffice" => ["labels" => array_keys($documentsPerOffice), "values" => array_values($documentsPerOffice), "title" => "Documents Processed"],
   //       "documentsPerMonth" => ["labels" => array_keys($documentsPerMonth), "values" => array_values($documentsPerMonth), "title" => "Documents Received"],
   //       "averageProcessingTime" => ["labels" => array_keys($averageProcessingTime), "values" => array_values($averageProcessingTime), "title" => "Avg Processing Time (Days)"],
   //       "activityLogs" => $activityLogs
   //    ]);
   // }

   // public function getChartData()
   // {
   //    // 1️⃣ Document Status Overview (Pie Chart)
   //    $documentStatuses = DB::table('documents')
   //       ->select('status', DB::raw('count(*) as total'))
   //       ->groupBy('status')
   //       ->pluck('total', 'status');

   //    // 2️⃣ Documents Processed Per Office (Bar Chart)
   //    $documentsPerOffice = DB::table('documents')
   //       ->selectRaw('offices.name as office, count(*) as total')
   //       ->join('users', 'documents.sender_id', '=', 'users.id') // Join documents → users
   //       ->join('offices', 'users.office_id', '=', 'offices.id') // Join users → offices
   //       ->groupBy('offices.name')
   //       ->pluck('total', 'office');

   //    // 3️⃣ Documents Per Month (Line Chart)
   //    $documentsPerMonth = DB::table('documents')
   //       ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
   //       ->groupBy(DB::raw('MONTH(created_at)'))
   //       ->pluck('total', 'month');

   //    // 4️⃣ Average Processing Time (Bar Chart)
   //    $avgProcessingTime = DB::table('documents')
   //       ->join('users', 'documents.sender_id', '=', 'users.id') // Fix office relation
   //       ->join('offices', 'users.office_id', '=', 'offices.id')
   //       ->select(
   //          'offices.name as office',
   //          DB::raw('AVG(DATEDIFF(documents.updated_at, documents.created_at)) as avg_days') // Specify table
   //       )
   //       ->groupBy('offices.name')
   //       ->pluck('avg_days', 'office');

   //    return response()->json([
   //       'documentStatuses' => $documentStatuses,
   //       'documentsPerOffice' => $documentsPerOffice,
   //       'documentsPerMonth' => $documentsPerMonth,
   //       'avgProcessingTime' => $avgProcessingTime,
   //    ]);
   // }
   public function getChartData()
   {
      // 1️⃣ Document Status Overview (Pie Chart)
      $documentStatuses = DB::table('documents')
         ->select('status', DB::raw('count(*) as total'))
         ->groupBy('status')
         ->pluck('total', 'status');

      // 2️⃣ Documents Processed Per Office (Bar Chart)
      $documentsPerOffice = DB::table('documents')
         ->join('users', 'documents.sender_id', '=', 'users.id') // Join documents → users
         ->join('offices', 'users.office_id', '=', 'offices.id') // Join users → offices
         ->select('offices.code as office_code', 'offices.name as office_name', DB::raw('count(*) as total'))
         ->groupBy('offices.code', 'offices.name')
         ->get(); // Fetch as array of objects

      // 3️⃣ Documents Per Month (Line Chart)
      $documentsPerMonth = DB::table('documents')
         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
         ->groupBy(DB::raw('MONTH(created_at)'))
         ->pluck('total', 'month');

      // 4️⃣ Average Processing Time (Bar Chart)
      // $avgProcessingTime = DB::table('documents')
      //    ->join('users', 'documents.sender_id', '=', 'users.id') // Fix office relation
      //    ->join('offices', 'users.office_id', '=', 'offices.id')
      //    ->select(
      //       'offices.code as office_code',
      //       'offices.name as office_name',
      //       DB::raw('AVG(DATEDIFF(documents.updated_at, documents.created_at)) as avg_days') // Specify table
      //    )
      //    ->groupBy('offices.code', 'offices.name')
      //    ->get();
      $avgProcessingTime = DB::table('documents')
         ->join('users', 'documents.sender_id', '=', 'users.id') // Fix office relation
         ->join('offices', 'users.office_id', '=', 'offices.id')
         ->select(
            'offices.code as office_code', // Get office code for x-axis
            'offices.name as office_name', // Get full office name for tooltip
            DB::raw('AVG(DATEDIFF(documents.updated_at, documents.created_at)) as avg_days') // Specify table
         )
         ->groupBy('offices.code', 'offices.name')
         ->get(); // Use get() instead of pluck() for structured data

      return response()->json([
         'documentStatuses' => $documentStatuses,
         'documentsPerOffice' => $documentsPerOffice,
         'documentsPerMonth' => $documentsPerMonth,
         'avgProcessingTime' => $avgProcessingTime,
      ]);
   }
}
