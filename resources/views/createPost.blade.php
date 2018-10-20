<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規作成</title>
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
      <div class="siimple-form-title">新規作成</div>
      <form class="siimple-form" action="{{action('MediaController@post')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="siimple-field">
          <label class="siimple-label">タイトル</label>
          <input class="siimple-input siimple-input--fluid" type="text" name="title" value="{{ old('title') }}" ></input>
          @if( $errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
          @endif
        </div>
        <div class="siimple-field">
          <label class="siimple-field-label">メッセージ</label>
          <textarea class="siimple-textarea siimple-textarea--fluid" name="body" rows="5">{{old('body')}}</textarea>
          @if( $errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
          @endif
        </div>
        <div class="siimple-field">
          <input type="file" name="image" ></input>
          @if( $errors->has('image'))
            <span class="error">{{ $errors->first('image') }}</span>
          @endif
        </div>
        <div class="siimple-field">
          <input class="siimple-btn" type="submit" value="投稿する"></input>
        </div>
      </form>
    </div>
  </body>
</html>
