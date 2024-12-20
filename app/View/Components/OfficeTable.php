<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Office;

class OfficeTable extends Component
{
   /**
    * Create a new component instance.
    */
   public $offices;

   public function __construct($offices)
   {
      $this->offices = $offices;  // Fetch all offices from the database
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.office-table');
   }
}
