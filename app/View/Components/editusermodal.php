<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class editusermodal extends Component
{
   /**
    * Create a new component instance.
    */
   public $user;
   public $offices;

   public function __construct($user, $offices)
   {
      $this->user = $user;
      $this->offices = $offices;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.editusermodal');
   }
}
