<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = [
        'title','category',
    ];

    public function room_create($room_info){
        $room=new Room;
        $room->title=$room_info["title"];
        $room->category=$room_info["category"];
        return $room->save();
    }
    
}
