<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::post('/create_room','App\Http\Controllers\RoomController@create_room');

Route::get('/chat/{room_id}','App\Http\Controllers\ChatController@show_chat');

Route::post('/send_message','App\Http\Controllers\MessageController@send_message');
Route::post('/show_content','App\Http\Controllers\MessageController@show_content');
