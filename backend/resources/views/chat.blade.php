@extends('layout')

@section('css')

<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection

@section('title', 'チャット画面')

@section('content')

<chat-component
:room_id="{{json_encode($room_id)}}"
:title="{{json_encode($title)}}"
:send_message_url="{{json_encode(url('/send_message'))}}"
:show_content_url="{{json_encode(url('/show_content'))}}"
:back_url="{{json_encode(url('/home'))}}"
></chat-component>
  


@endsection