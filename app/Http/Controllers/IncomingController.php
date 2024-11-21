<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomingController extends Controller
{
    //
    public function incoming(){
        return view('dashboard');
    }
}
