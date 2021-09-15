@extends('layout')

@section('css')

<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection

@section('title', 'ホーム画面')

@section('content')

<chat-component
:room_id="{{json_encode($room_id)}}"
:title="{{json_encode($title)}}"
:api_url="{{json_encode(url('/send_message'))}}"
></chat-component>
  


@endsection