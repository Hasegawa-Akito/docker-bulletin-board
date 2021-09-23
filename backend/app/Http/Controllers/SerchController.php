<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;


class SerchController extends Controller
{
    public function show_serch(Request $request){
        $room_id=$request->input('room_id');
        $title=$request->input('title');
        $category=$request->input('category');
        $room_info=["room_id"=>$room_id,
                     "title"=>$title,
                     "category"=>$category,
                     ];
        
        $room=new Room;
        $contents=$room->serch_room($room_info);

        $json = ["contents" => $contents];
        
        return response()->json($json);
    }

    public function serch_room(Request $request){
        
        $room_id=$request->room_id;
        $title=$request->title;
        $category=$request->category;
        //dd($category);
        
        return view('serch',["room_id"=>$room_id,"title"=>$title,"category"=>$category]);

    }

}
