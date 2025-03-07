<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subcategorypage extends Component
{
   /**
    * Create a new component instance.
    */
   public $categories;
   // public $totalItems;
   public function __construct($categories)
   {
      $this->categories = $categories;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view(
         'components.subcategorypage',
         [
            'categories' => $this->categories
         ]
      );
   }
}
