@extends ('layouts.master')

@section ('content') 
  @foreach($posts as $post)   
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{ route('show-post', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
        <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{ $post->user->name}}</a></p>
        {{ str_limit($post->content, $limit = 150, $end = '...') }}
        @if(Auth::user() && Auth::user()->admin)
        	<a href="{{ route('edit-post', [ 'id' => $post->id ]) }}">Edit</a>
	        <a href="{{ action('PostController@destroy') }}"
			          onclick="event.preventDefault();
			               document.getElementById('post-destroy-form-{{$post->id}}').submit();">
		        Destroy
			</a>
	        <form id="post-destroy-form-{{$post->id}}" action="{{ action('PostController@destroy') }}" method="POST" style="display: none;">
	          {{ csrf_field() }}
	          <input type="hidden" name="post_id" value="{{$post->id}}">
	        </form>		
	    @endif    
    </div><!-- /.blog-post -->
  @endforeach
@endsection