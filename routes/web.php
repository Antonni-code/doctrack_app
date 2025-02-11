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

Route::get('/', function () {
   return view('landing');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('custom.login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

   // Route::get('/dashboard', function () {
   //     return view('dashboard');
   // })->name('dashboard');

   Route::controller(IncomingController::class)->group(function () {
      Route::get('dashboard', 'incoming')->name('dashboard');
      Route::post('dashboard/document/store', 'store')->name('documents.store');
      Route::get('/dashboard/users/search',  'searchUsers')->name('incoming.users.search');
      Route::get('/dashboard/sub-classifications', 'fetchSubClassifications')->name('incoming.subclass.search');
      Route::post('dashboard/document/release/{document_code}', 'releaseDocument')->name('documents.release');
      Route::get('dashboard/attachment/download/{id}', 'download')->name('download.attachment');
      Route::post('dashboard/attachments/upload/{document}', 'upload')->name('attachments.upload');
      Route::delete('dashboard/attachments/{id}', 'destroy')->name('attachments.delete');
   });

   Route::controller(OutgoingController::class)->group(function () {
      Route::get('dashboard/outgoing', 'outgoing')->name('outgoing');
      Route::delete('dashboard/outgoing/{id}', 'deleteDocs')->name('documents.delete');
   });

   Route::controller(TrackController::class)->group(function () {
      Route::get('dashboard/trackview', 'trackpage')->name('trackpage');
      Route::get('dashboard/trackview/search/{documentCode?}', 'search')->name('searchLog');
   });

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

   Route::controller(UserController::class)->group(function () {
      Route::get('dashboard/user-management', 'usermanagement')->name('usermanagement');
      Route::post('dashboard/user-create', 'store')->name('user.create');
      Route::delete('users/{id}/delete', 'softDelete')->name('user.delete');
      Route::post('/users/{id}/reactivate', 'restore')->name('user.restore');
      Route::get('/users/{id}/edit', 'edit')->name('user.edit');
      Route::put('/users/{id}', 'update')->name('user.update');
   });

   Route::controller(MailSentController::class)->group(function () {
      Route::get('dashboard/mail-sent', 'mailsent')->name('mailsent');
   });

   // Chunk file upload
   // Route::controller(FileUploadController::class)->group(function () {
   //    Route::post('/upload-chunk', 'upload')->name('upload.chunk');
   // });
});
