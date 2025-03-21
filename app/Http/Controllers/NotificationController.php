<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
   // Fetch unread notifications for the logged-in user
   public function fetchNotifications(Request $request)
   {
      $userId = auth()->id();

      $notifications = DB::table('notification')
         ->where('recipient_id', $userId)
         ->whereNull('read_at') // Only fetch unread notifications
         ->orderBy('created_at', 'desc')
         ->get();

      return response()->json($notifications);
   }

   // Mark all notifications as read
   public function markNotificationsAsRead()
   {
      $userId = auth()->id();

      DB::table('notification')
         ->where('recipient_id', $userId)
         ->whereNull('read_at')
         ->update(['read_at' => now()]); // Mark as read

      return response()->json(['message' => 'Notifications marked as read']);
   }
}
