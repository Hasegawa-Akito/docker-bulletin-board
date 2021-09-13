<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class CreateRoomController extends Controller
{
    public function create_room(Request $request){
        //dd($request->category);

        $room_info=["title"=>$request->title,
                    "category"=>$request->category,
                ];

        $room=new Room;
        $room->room_create($room_info);
        
        return redirect(url("/chat"));
    }
}
