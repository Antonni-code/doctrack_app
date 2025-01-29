<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subcategorytable extends Component
{
   /**
    * Create a new component instance.
    */
   public $categories;
   public $totalPages;
   public $page;
   public $perPage;
   public $totalItems;
   public function __construct($categories, $totalPages, $page, $perPage, $totalItems)
   {
      $this->categories = $categories;
      $this->totalPages = $totalPages;
      $this->page = $page;
      $this->perPage = $perPage;
      $this->totalItems = $totalItems;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.subcategorytable');
   }
}
