<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandardRoomController extends Controller
{
    //
    public function standardRooms()
    {
        return view('standardRoom');
    }
}
