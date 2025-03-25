<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Models\User;
use App\Models\UserActivity;


class DashboardController extends Controller
{
   public function dashboard()
   {
      return view('dash-board');
   }


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


      $activityLog = UserActivity::with('user')
         ->selectRaw('users.name as user, COUNT(*) as total')
         ->join('users', 'user_activities.user_id', '=', 'users.id')
         ->groupBy('users.name')
         ->pluck('total', 'user');

      return response()->json([
         'documentStatuses' => $documentStatuses,
         'documentsPerOffice' => $documentsPerOffice,
         'documentsPerMonth' => $documentsPerMonth,
         'avgProcessingTime' => $avgProcessingTime,
         'activityLog' => $activityLog,
      ]);
   }

   public function getActivityLogs()
   {
      $logs = UserActivity::with('user')
         ->orderBy('created_at', 'desc')
         ->get()
         ->map(function ($log) {
            return [
               'name' => $log->user->name ?? 'Unknown User',
               'action' => $log->action,
               'created_at' => $log->created_at,
            ];
         });

      return response()->json($logs);
   }
}
