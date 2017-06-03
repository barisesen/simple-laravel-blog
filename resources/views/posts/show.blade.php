@extends ('layouts.master')

@section ('content') 
  <div class="blog-post">
      <h2 class="blog-post-title"><a href="{{ route('show-post', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
      <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{ $post->user->name}}</a></p>
      {{ $post->content }}
       <a href="{{ action('PostController@destroy') }}"
	          onclick="event.preventDefault();
	               document.getElementById('post-destroy-form-{{$post->id}}').submit();">
        Sil
	</a>
      <form id="post-destroy-form-{{$post->id}}" action="{{ action('PostController@destroy') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{$post->id}}">
      </form>		
  </div><!-- /.blog-post -->
@endsection