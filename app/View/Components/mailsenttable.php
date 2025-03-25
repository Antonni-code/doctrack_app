<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mailsenttable extends Component
{
   /**
    * Create a new component instance.
    */
   public $mailSent;

   public function __construct($mailSent)
   {
      $this->mailSent = $mailSent;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.mailsenttable');
   }
}
