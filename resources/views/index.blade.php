@extends('layouts.mediaTemplate')

@section('title','記事一覧')

@section('content')
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
@endsection
@section('footer')
<div class="siimple-footer siimple-footer--primary siimple-footer--fluid">
  {{ $posts->links() }}
</div>
@endsection
