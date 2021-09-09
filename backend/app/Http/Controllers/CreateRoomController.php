<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateRoomController extends Controller
{
    public function create_room(Request $request){
        dd($request->category);
    }
}
