<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{

   /**
    * Register services.
    */
   public function register(): void {}

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot(): void {}
}
