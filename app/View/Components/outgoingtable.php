<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class outgoingtable extends Component
{
   /**
    * Create a new component instance.
    */
   public $outgoingDocuments;
   public function __construct($outgoingDocuments)
   {
      $this->outgoingDocuments = $outgoingDocuments;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.outgoingtable');
   }
}
