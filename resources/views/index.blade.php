<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>記事一覧</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/siimple@3.1.1/dist/siimple.min.css">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
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
    <div class="siimple-content siimple-content--medium">
      <div class="siimple-menu">
        <div class="siimple-menu-group">最新の投稿</div>
      @forelse ( $posts as $post )
        <a class="siimple-menu-item siimple-link" href="{{ action('MediaController@detail' , $post->id ) }}">{{ $post->title }}</a>
      @empty
        <p>投稿はありません</p>
      @endforelse
      </div>
    </div>
    <div class="siimple-footer siimple-footer--primary siimple-footer--fluid">
    {{ $posts->links() }}
    </div>
  </body>
</html>
