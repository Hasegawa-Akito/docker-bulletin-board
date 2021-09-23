<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = [
        'title','category','comment_num'
    ];

    public function room_create($room_info){
        $room=new Room;
        $room->title=$room_info["title"];
        $room->category=$room_info["category"];
        $room->comment_num=0;
        return $room->save();
    }

    public function update_comment_num($room_id){
        $comment_num=Message::where('room_id',$room_id)
                            ->count();
                            
        $room=Room::where('room_id',$room_id)
                  ->update(['comment_num' => $comment_num]);
        
        return true;
    }

    public function serch_room($room_info){
        $room_id=$room_info["room_id"];
        if(!isset($room_id)){
            $room_id="%";
        }
        $title="%".$room_info["title"]."%";
        $category="%".$room_info["category"]."%";

        $contents=Room::where('room_id','like',$room_id)
                      ->where('title','like',$title)
                      ->where('category','like',$category)
                      ->orderBy('comment_num', 'desc')
                      ->get();
        
        return $contents;
    }
    
}
