<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="{{ action('MediaController@createPost') }}">投稿する</a>
    @forelse ( $posts as $post )
      <p><a href="{{ action('MediaController@detail' , $post->id ) }}">{{ $post->title }}</a></p>
    @empty
      <p>no posts</p>
    @endforelse
  </body>
</html>
