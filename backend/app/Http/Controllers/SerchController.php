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

        $request->session()->put('room_id',$room_id);
        $request->session()->put('title',$title);
        $request->session()->put('category',$category);
        $request->session()->put('session_exist',"exist");
        
        return view('serch',["room_id"=>$room_id,"title"=>$title,"category"=>$category]);

    }

    //"/serch_room"のurlを直接叩かれた時
    public function serch_room_direct(Request $request){
        $room_id=$request->session()->get('room_id');
        $title=$request->session()->get('title');
        $category=$request->session()->get('categor');
        $session_exist=$request->session()->get('session_exist');

        if(!isset($session_exist)){
            return redirect(url('/home'));
        }

        $room_id=$request->room_id;
        $title=$request->title;
        $category=$request->category;
        //dd($category);
        
        return view('serch',["room_id"=>$room_id,"title"=>$title,"category"=>$category]);

    }

}
