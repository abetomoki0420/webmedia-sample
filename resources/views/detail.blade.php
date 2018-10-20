<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>{{ $post->title}}</h1>
    <p>{{ $post->body }}</p>
    @isset( $imageUrl )
    <img src="{{ $imageUrl }}"></img>
    @endisset
  </body>
</html>
