<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="{{action('MediaController@post')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <p>Title</p>
      <input type="text" name="title" value="{{ old('title') }}" ></input>
      @if( $errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
      @endif
      <p>本文</p>
      <textarea name="body">{{old('body')}}</textarea>
      @if( $errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
      @endif
      <input type="file" name="image" ></input>
      @if( $errors->has('image'))
        <span class="error">{{ $errors->first('image') }}</span>
      @endif
      <input type="submit">投稿する</input>
    </form>
  </body>
</html>
