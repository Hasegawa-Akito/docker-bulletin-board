<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function send_message(Request $request){
        $room_id=$request->input('room_id');
        $name=$request->input('name');
        $message=$request->input('message');
        
        $message_info=["room_id"=>$room_id,
                       "name"=>$name,
                       "message"=>$message,
                      ];
        
        $message=new Message;
        $message->message_create($message_info);

        $contents=Message::where("room_id",$room_id)
                         ->get();

        $json = ["contents" => $contents];
        
        
        return response()->json($json);
    }

    public function show_content(Request $request){
        $room_id=$request->input('room_id');

        $contents=Message::where("room_id",$room_id)
                         ->get();

        $json = ["contents" => $contents];
        
        
        return response()->json($json);
    }
}
