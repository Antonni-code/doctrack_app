<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::controller(IncomingController::class)->group(function () {
        Route::get('dashboard', 'incoming')->name('dashboard');
    });

    Route::controller(OutgoingController::class)->group(function () {
        Route::get('dashboard/outgoing', 'outgoing')->name('outgoing');
    });
});
