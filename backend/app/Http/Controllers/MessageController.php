<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Room;


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

        //roomデータのコメント数を更新
        $room=new Room;
        $room->update_comment_num($room_id);

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
