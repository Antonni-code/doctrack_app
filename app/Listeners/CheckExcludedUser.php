<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Attempting;

class CheckExcludedUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {

      $user = $event->user;

        if ($user && $user->excluded) {
            abort(403, 'Your account is excluded. Please contact the administrator.');
        }
    }
}
