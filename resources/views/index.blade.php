@extends('layouts.mediaTemplate')

@section('title','記事一覧')

@section('content')
  @if( count($posts) > 0 )
    <div class="siimple-table">
      <div class="siimple-table-header">
        <div class="siimple-table-row">
          <div class="siimple-table-cell">タイトル</div>
          <div class="siimple-table-cell">書いた人</div>
          <div class="siimple-table-cell">投稿日時</div>
        </div>
      </div>
      <div class="siimple-table-body">
        @foreach ( $posts as $post )

          <div class="siimple-table-row">
            <a class="siimple-link siimple-table-cell" href="{{ action('MediaController@detail' , $post->id ) }}">
              {{ $post->title }}
            </a>
            <div class="siimple-table-cell">{{ $post->user->name }}</div>
            <div class="siimple-table-cell">{{ $post->created_at }}</div>
            <div class="siimple-table-cell">
              @auth
                @if( Auth::user()->name == $post->user->name )
                  <span class="siimple-small"><a class="siimple-link" href="{{ action('MediaController@editPost' , $post->id )}}">Edit</a></span>
                  <span class="siimple-small"><a class="siimple-link" href="{{ action('MediaController@deletePost' , $post->id )}}">Delete</a></span>
                @endif
              @endauth
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <p>投稿はありません</p>
  @endif
@endsection
@section('footer')
<div class="siimple--text-center">
  {{ $posts->onEachSide(3)->links() }}
</div>
@endsection
