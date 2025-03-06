<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class incoming extends Component
{
   /**
    * Create a new component instance.
    */
   public $incomingDocuments;
   public $users;
   public $classifications;
   public $documentCode;
   public $loggedInUser;
   public $activeUsers;
   public $excludedUsers;
   public $countIncoming;
   public $countOutgoing;
   public $countPending;
   public $totalItems;
   public $usualCount;
   public $urgentCount;

   public function __construct($incomingDocuments, $users, $classifications, $documentCode, $loggedInUser, $activeUsers, $excludedUsers, $countIncoming, $countOutgoing, $countPending, $totalItems, $usualCount, $urgentCount)
   {
      $this->incomingDocuments = $incomingDocuments;
      $this->users = $users;
      $this->classifications = $classifications;
      $this->documentCode = $documentCode;
      $this->loggedInUser = $loggedInUser;
      $this->activeUsers = $activeUsers;
      $this->excludedUsers = $excludedUsers;
      $this->countIncoming = $countIncoming;
      $this->countOutgoing = $countOutgoing;
      $this->countPending = $countPending;
      $this->totalItems = $totalItems;
      $this->usualCount = $usualCount;
      $this->urgentCount = $urgentCount;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.incoming');
   }
}
