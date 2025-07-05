<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VipRoomController extends Controller
{
    //
    public function vipRooms()
    {
        return view('vipRoom');
    }
}
