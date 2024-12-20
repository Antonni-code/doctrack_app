<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addmodaluser extends Component
{
   /**
    * Create a new component instance.
    */
   public $offices;

   public function __construct($offices)
   {
      $this->offices = $offices;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.addmodaluser');
   }
}
