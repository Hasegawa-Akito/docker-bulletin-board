@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('title', 'ホーム画面')

@section('content')

<chat-component></chat-component>
  


@endsection