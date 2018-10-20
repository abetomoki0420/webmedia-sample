@extends('layouts.mediaTemplate')

@section('title' , $post->title )

@section('content')
  <a class="siimple-link" href="{{ url('/')}}" >戻る</a>
  <div class="siimple-box">
    <div class="siimple-box-title">{{ $post->title}}</div>
    <div class="siimple-box-subtitle">{{ $post->body }}</div>
    @isset( $imageUrl )
    <img src="{{ $imageUrl }}" height="500" height="500"></img>
    @endisset
    <div class="siimple--text-right siimple-box-detail">書いた人:{{ $post->user->name}}</div>
@endsection
