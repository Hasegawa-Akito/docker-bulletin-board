@extends('layout')

@section('css')

<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection

@section('title', 'ホーム画面')

@section('content')

<chat-component></chat-component>
  


@endsection