<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // sub category
    public function subcategory(){
      return view('maintenance.sub-category');
    }
    // offices
    public function offices(){
      return view('maintenance.offices');
    }
}
