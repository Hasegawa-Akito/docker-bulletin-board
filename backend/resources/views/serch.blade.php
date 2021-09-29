@extends('layout')

@section('title', '検索画面')

@section('content')

<serch-component
:serch_room_id="{{json_encode($room_id)}}"
:serch_title="{{json_encode($title)}}"
:serch_category="{{json_encode($category)}}"
:show_serch_url="{{json_encode(url('/show_serch'))}}"
:back_url="{{json_encode(url('/home'))}}"
:room_url="{{json_encode(url('/chat'))}}"
></serch-component>
@endsection
