@extends('layout')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('title', 'ホーム画面')

@section('content')

<main class="container">
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">チャット型掲示板</h1>
    <p class="lead">ルーム作成 または ルーム検索 をして会話を始めましょう。</p>
  </div>

  <home-component
  :create_room_url="{{json_encode(url('/create_room'))}}"
  :serch_room_url="{{json_encode(url('/serch_room'))}}"
  :csrf="{{json_encode(csrf_token())}}"
  ></home-component>

  
</main>
  


@endsection