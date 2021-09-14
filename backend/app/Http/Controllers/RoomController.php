<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    
    public function create_room(Request $request){
        //dd($request->category);

        $room_info=["title"=>$request->title,
                    "category"=>$request->category,
                ];

        $room=new Room;
        $room->room_create($room_info);

        $room_id=Room::where('title',$request->title)
                     ->where('category',$request->category)
                     ->orderBy('room_id','desc')
                     ->first()
                     ->room_id;
        //dd($room_id);
        
        return redirect(url("/chat/".$room_id));
    }
}
