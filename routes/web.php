<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
   return view('welcome');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('custom.login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

   // Route::get('/dashboard', function () {
   //     return view('dashboard');
   // })->name('dashboard');

   Route::controller(IncomingController::class)->group(function () {
      Route::get('dashboard', 'incoming')->name('dashboard');
   });

   Route::controller(OutgoingController::class)->group(function () {
      Route::get('dashboard/outgoing', 'outgoing')->name('outgoing');
   });

   Route::controller(TrackController::class)->group(function () {
      Route::get('dashboard/track', 'trackpage')->name('trackpage');
   });

   Route::controller(MaintenanceController::class)->group(function () {
      Route::get('dashboard/maintenance/sub-category', 'subcategory')->name('subcategory');
      Route::get('dashboard/maintenance/offices', 'offices')->name('offices');
   });

   Route::controller(UserController::class)->group(function () {
      Route::get('dashboard/user-management', 'usermanagement')->name('usermanagement');
      Route::post('dashboard/user-create', 'store')->name('user.create');
      Route::delete('dashboard/user-management/users/{id}', 'softDelete')->name('user.delete');
      Route::post('/users/{id}/reactivate', 'restore')->name('user.restore');
      Route::get('/users/{id}/edit', 'edit')->name('user.edit');
      Route::put('/users/{id}', 'update')->name('user.update');
   });
});
