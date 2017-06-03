@extends ('layouts.master')

@section ('content') 
  <div class="blog-post">
      <h2 class="blog-post-title">{{ $post->title }}</h2>
      <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{ $post->user->name}}</a></p>
      {{ $post->content }}
       @if( Auth::user() && Auth::user()->admin )
         <a href="{{ action('PostController@destroy') }}"
  	          onclick="event.preventDefault();
  	               document.getElementById('post-destroy-form-{{ $post->id }}').submit();">
            Destroy
  	     </a>
       @endif  
      <form id="post-destroy-form-{{ $post->id }}" action="{{ action('PostController@destroy') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
      </form>		
  </div><!-- /.blog-post -->
  @if( Auth::user() )
    <div class="container col-md-8"> <!-- Post content only auth users -->
      <form action="{{ action('CommentController@store') }}" method="POST" accept-charset="utf-8">
      {{ csrf_field() }}
      <input type="hidden" name="post_id" value="{{ $post->id }}">
      <div class="form-group">
        <label for="content">Comment</label>
        <textarea name="content" class="form-control" id="content" placeholder="Comment Content"></textarea>
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div class=row></div>
    </div>
  @endif  
  <div class="container col-md-8">
      @foreach($post->comments as $comment)
        <div> 
          <span>{{ $comment->user->name }}</span>
          <br>
          <span>{{ $comment->content }}</span>
          <br>
          <span>{{ $comment->created_at }}</span> 
           @if( Auth::user() &&  ( Auth::user() == $comment->user || Auth::user()->admin ) )
             <a href="{{ action('PostController@destroy') }}"
                  onclick="event.preventDefault();
                       document.getElementById('comment-destroy-form-{{ $comment->id }}').submit();">
                Destroy
             </a>
           @endif  
          <form id="comment-destroy-form-{{ $comment->id }}" action="{{ action('CommentController@destroy') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
          </form> 
        </div>
        <hr>
      @endforeach
  </div>
@endsection