<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send_message(Request $request){
        $name=$request->input('name');
        $json = ["name" => $name];
        
        
        return response()->json($json);
    }
}
