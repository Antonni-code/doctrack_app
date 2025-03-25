<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class incomingtable extends Component
{
   /**
    * Create a new component instance.
    */
   public $incomingDocuments;
   public $classifications;
   public $users;
   public $documentCode;
   public $loggedInUser;
   public $activeUsers;
   public $excludedUsers;
   public $countIncoming;
   public $countOutgoing;
   public $countPending;
   public $totalPages;
   public $page;
   public $perPage;
   public $totalItems;
   public function __construct(
      $incomingDocuments,
      $classifications,
      $users,
      $documentCode,
      $loggedInUser,
      $activeUsers,
      $excludedUsers,
      $countIncoming,
      $countOutgoing,
      $countPending,
      $totalPages,
      $page,
      $perPage,
      $totalItems
   ) {
      $this->incomingDocuments = $incomingDocuments;
      $this->classifications = $classifications;
      $this->users = $users;
      $this->documentCode = $documentCode;
      $this->loggedInUser = $loggedInUser;
      $this->activeUsers = $activeUsers;
      $this->excludedUsers = $excludedUsers;
      $this->countIncoming = $countIncoming;
      $this->countOutgoing = $countOutgoing;
      $this->countPending = $countPending;
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
      return view('components.incomingtable');
   }
}
