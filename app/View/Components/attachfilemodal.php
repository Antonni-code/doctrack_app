<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class attachfilemodal extends Component
{
   /**
    * Create a new component instance.
    */
   public $document;
   public function __construct($document)
   {
      $this->document = $document;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.attachfilemodal');
   }
}
