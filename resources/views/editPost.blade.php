@extends('layouts.mediaTemplate')

@section('title' , '記事編集')

@section('content')
  <form class="siimple-form" action="{{action('MediaController@edit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="siimple-field">
      <label class="siimple-field-label">タイトル</label>
      <input class="siimple-input siimple-input--fluid" type="text" name="title" value="{{ $errors->has('title') ? old('title') : $post->title }}" required></input>
      @if( $errors->has('title'))
        <span class="siimple--color-error">{{ $errors->first('title') }}</span>
      @endif
    </div>
    <div class="siimple-field">
      <label class="siimple-field-label">メッセージ</label>
      <textarea class="siimple-textarea siimple-textarea--fluid" name="body" rows="5" required>{{ $errors->has('body') ? old('body') : $post->body }}</textarea>
      @if( $errors->has('body'))
        <span class="siimple--color-error">{{ $errors->first('body') }}</span>
      @endif
    </div>
    <div class="siimple-field">
      <input class="siimple-btn siimple-btn--primary" type="submit" value="修正する"></input>
    </div>
    <input type="hidden" name="post_id" value="{{ $post->id }}">
  </form>
@endsection
