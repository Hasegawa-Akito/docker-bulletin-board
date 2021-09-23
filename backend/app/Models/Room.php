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
    
}
