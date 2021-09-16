<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table='messages';
    protected $fillable = [
        'room_id','name','message'
    ];

    public function message_create($message_info){
        $message=new Message;
        $message->room_id=$message_info["room_id"];
        $message->name=$message_info["name"];
        $message->message=$message_info["message"];
        return $message->save();
    }
}
