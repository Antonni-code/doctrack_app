<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MailSentController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GmailController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
   return view('landing');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('custom.login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

   // Route::get('/dashboard', function () {
   //     return view('dashboard');
   // })->name('dashboard');

   // Route::controller(GmailController::class)->group(function () {
   //    Route::get('/dashboard/gmail', 'gmail')->name('gmail');
   //    Route::get('/auth/google',  'redirectToGoogle')->name('gmail.Auth');
   //    Route::get('/callback',  'handleGoogleCallback');
   //    Route::get('/dashboard/data' , 'getChartData')->name('getChartData');
   //    Route::get('/dashboard/activity-logs',  'getActivityLogs')->name('activity.logs');
   // });


   // Route::controller(DashboardController::class)->group(function () {
   //    Route::get('/dashboard', 'dashboard')->name('dashboard2');
   //    Route::get('/dashboard/data', 'getChartData')->name('getChartData');
   //    Route::get('/dashboard/activity-logs',  'getActivityLogs')->name('activity.logs');
   // });

   // Apply role-based access for the dashboard (only admins can access)
   Route::middleware(['auth', 'role:admin'])->group(function () {
      Route::controller(DashboardController::class)->group(function () {
         Route::get('/dashboard', 'dashboard')->name('dashboard2');
         Route::get('/dashboard/data', 'getChartData')->name('getChartData');
         Route::get('/dashboard/activity-logs',  'getActivityLogs')->name('activity.logs');
      });
   });

   // Notification
   Route::controller(NotificationController::class)->group(function () {
      Route::get('/notifications/fetch', 'fetchNotifications')->name('notifications.fetch');
      Route::post('/notifications/mark-as-read', 'markNotificationsAsRead')->name('notifications.markAsRead');
   });

   Route::controller(IncomingController::class)->group(function () {
      Route::get('dashboard/incoming', 'incomingPage')->name('dashboard');
      Route::post('dashboard/document/store', 'store')->name('documents.store');
      Route::get('/dashboard/users/search',  'searchUsers')->name('incoming.users.search');
      Route::get('/dashboard/sub-classifications', 'fetchSubClassifications')->name('incoming.subclass.search');
      // Route::post('dashboard/document/release/{document_code}', 'releaseDocument')->name('documents.release');

      Route::post('dashboard/document/release/{id}', 'releaseDocument')->name('documents.release');

      Route::post('dashboard/document/receive/{id}', 'receiveDocument')->name('documents.received');

      Route::get('dashboard/attachment/download/{id}', 'download')->name('download.attachment');
      Route::post('dashboard/attachments/upload/{document}', 'upload')->name('attachments.upload');
      Route::delete('dashboard/attachments/{id}', 'destroy')->name('attachments.delete');
      Route::get('/dashboard/activity-logs',  'getActivityLogs')->name('activity.logs');
   });

   Route::controller(OutgoingController::class)->group(function () {
      Route::get('dashboard/outgoing', 'outgoing')->name('outgoing');
      Route::delete('dashboard/outgoing/{id}', 'deleteDocs')->name('documents.delete');
   });

   Route::controller(TrackController::class)->group(function () {
      Route::get('dashboard/trackview', 'trackpage')->name('trackpage');
      Route::get('dashboard/trackview/search/{documentCode?}', 'search')->name('searchLog');
   });

   Route::middleware(['auth', 'role:admin'])->group(function () {
      Route::controller(MaintenanceController::class)->group(function () {
         Route::get('dashboard/maintenance/sub-category', 'subcategory')->name('subcategory');
         Route::get('dashboard/maintenance/offices', 'offices')->name('offices');
         // Office CRUD operations
         Route::post('dashboard/maintenance/offices', 'storeOffice')->name('offices.store');
         Route::get('dashboard/maintenance/offices/{id}', 'getOffice')->name('offices.get');
         Route::put('dashboard/maintenance/offices/{id}', 'updateOffice')->name('offices.update');
         Route::delete('dashboard/maintenance/offices/{id}', 'deleteOffice')->name('offices.delete');

         // Classification CRUD operations
         Route::post('/dashboard/maintenance/sub-category', 'storeclass')->name('class.store');
         Route::put('dashboard/maintenance/sub-category/{id}', 'updateclass')->name('class.update');
         Route::delete('dashboard/maintenance/sub-category/{id}', 'deleteclass')->name('class.delete');
      });
   });

   Route::middleware(['auth', 'role:admin'])->group(function () {
      Route::controller(UserController::class)->group(function () {
         Route::get('dashboard/user-management', 'usermanagement')->name('usermanagement');
         Route::post('dashboard/user-create', 'store')->name('user.create');
         Route::delete('users/{id}/delete', 'softDelete')->name('user.delete');
         Route::post('/users/{id}/reactivate', 'restore')->name('user.restore');
         Route::get('/users/{id}/edit', 'edit')->name('user.edit');
         Route::put('/users/{id}', 'update')->name('user.update');
      });
   });


   Route::controller(MailSentController::class)->group(function () {
      Route::get('dashboard/mail-sent', 'mailsent')->name('mailsent');
   });

   // Chunk file upload
   // Route::controller(FileUploadController::class)->group(function () {
   //    Route::post('/upload-chunk', 'upload')->name('upload.chunk');
   // });
});
