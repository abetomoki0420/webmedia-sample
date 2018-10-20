<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @auth
      <p>ユーザーはログインしている
        <a href="{{ action('MediaController@createPost') }}">投稿する</a>
      <a href="{{ action('UserController@logout')}}">ログアウト</a>
    @endauth
    @guest
      <p>hello guest</p>
      <a href="{{ action('HomeController@index')}}">ログイン</a>
    @endguest
    @forelse ( $posts as $post )
      <p><a href="{{ action('MediaController@detail' , $post->id ) }}">{{ $post->title }}</a></p>
    @empty
      <p>no posts</p>
    @endforelse
    {{ $posts->links() }}
  </body>
</html>
