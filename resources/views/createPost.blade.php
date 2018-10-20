@extends('layouts.mediaTemplate')

@section('title' , '新規作成')

@section('content')
  <div class="siimple-form-title">新規作成</div>
  <form class="siimple-form" action="{{action('MediaController@post')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="siimple-field">
      <label class="siimple-label">タイトル</label>
      <input class="siimple-input siimple-input--fluid" type="text" name="title" value="{{ old('title') }}" ></input>
      @if( $errors->has('title'))
        <span class="siimple--color-error">{{ $errors->first('title') }}</span>
      @endif
    </div>
    <div class="siimple-field">
      <label class="siimple-field-label">メッセージ</label>
      <textarea class="siimple-textarea siimple-textarea--fluid" name="body" rows="5">{{old('body')}}</textarea>
      @if( $errors->has('body'))
        <span class="siimple--color-error">{{ $errors->first('body') }}</span>
      @endif
    </div>
    <div class="siimple-field">
      <input type="file" name="image" accept=".jpg,.png,.gif" ></input>
      @if( $errors->has('image'))
        <span class="siimple--color-error">{{ $errors->first('image') }}</span>
      @endif
    </div>
    <div class="siimple-field">
      <input class="siimple-btn siimple-btn--primary" type="submit" value="投稿する"></input>
    </div>
  </form>
@endsection
