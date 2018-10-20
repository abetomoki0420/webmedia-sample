<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@section('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/siimple@3.1.1/dist/siimple.min.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
  </head>
  <body>
    <div class="siimple-navbar siimple-navbar--primary siimple-navbar--fluid">
      <a href="/" ><div class="siimple-navbar-title">WebMediaSample</div></a>
      @auth
        <div class="siimple-navbar-subtitle">こんにちは {{ Auth::user()->name }} さん</div>
        <div class="siimple--float-right">
          <a class="siimple-navbar-item" href="{{ action('MediaController@createPost') }}">投稿する</a>
          <a class="siimple-navbar-item" href="{{ action('UserController@logout')}}">ログアウト</a>
        </div>
      @endauth
      @guest
        <a class="siimple-navbar-item siimple--float-right" href="{{ url('/register')}}">新規登録</a>
        <a class="siimple-navbar-item siimple--float-right" href="{{ url('/login')}}">ログイン</a>
      @endguest
    </div>

    <div class="siimple-content siimple-content--medium">
      @yield('content')
    </div>
    <div>
      @yield('footer')
    </div>
  </body>
</html>
