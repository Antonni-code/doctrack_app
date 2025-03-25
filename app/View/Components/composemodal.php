<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class composemodal extends Component
{
   /**
    * Create a new component instance.
    */
   public $loggedInUser;
   public $users;
   public $classifications;

   public function __construct($loggedInUser, $users, $classifications)
   {
      $this->loggedInUser = $loggedInUser;
      $this->users = $users;
      $this->classifications = $classifications;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.composemodal');
   }
}
