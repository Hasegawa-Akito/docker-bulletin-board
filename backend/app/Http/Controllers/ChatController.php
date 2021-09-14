<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class ChatController extends Controller
{
    public function show_chat(Request $request,$room_id){
        //dd($room_id);
        $room=Room::where("room_id",$room_id)
                  ->first();
        $room_id=$room->room_id;
        $title=$room->title;
        //dd($title);
        
        return view('chat',["room_id"=>$room_id,"title"=>$title]);
    }
}
