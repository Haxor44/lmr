<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingConfirmationController extends Controller
{
    //
    public function index(){
        return view('confirmation');
    }
}

