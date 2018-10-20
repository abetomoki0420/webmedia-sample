<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/siimple@3.1.1/dist/siimple.min.css">
  </head>
  <body>
    <div class="siimple-navbar siimple-navbar--primary siimple-navbar--fluid">
      <a href="{{ url('/')}}" ><div class="siimple-navbar-title">WebMediaSample</div></a>
      @auth
      <div class="siimple-navbar-subtitle">こんにちは {{ Auth::user()->name }} さん</div>
      <div class="siimple--float-right">
        <a class="siimple-navbar-item" href="{{ action('MediaController@createPost') }}">投稿する</a>
        <a class="siimple-navbar-item" href="{{ action('UserController@logout')}}">ログアウト</a>
      </div>
      @endauth
      @guest
      <a class="siimple-navbar-item siimple--float-right" href="{{ url('/login')}}">ログイン</a>
      @endguest
    </div>
    <div class="siimple-content siimple-content--medium">
      <a class="siimple-link" href="{{ url('/')}}" >戻る</a>
      <div class="siimple-box">
        <div class="siimple-box-title">{{ $post->title}}</div>
        <div class="siimple-box-subtitle">{{ $post->body }}</div>
        @isset( $imageUrl )
        <img src="{{ $imageUrl }}"></img>
        @endisset
        <div class="siimple--float-right siimple-box-detail">書いた人:{{ $post->user->name}}</div>
        </div>
      </div>
    </div>
  </body>
</html>
