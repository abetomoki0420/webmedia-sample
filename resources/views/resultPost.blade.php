<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>記事を投稿しました</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/siimple@3.1.1/dist/siimple.min.css">
  </head>
  <body>
    <div class="siimple-navbar siimple-navbar--primary siimple-navbar--fluid">
      <div class="siimple-navbar-title">WebMediaSample</div>
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
    <div class="siipmle-content siimple-content--medium">
      <p>記事を投稿しました</p>
      <a class="siimple-link" href="/">一覧に戻る</a>
    </div>
  </body>
</html>
