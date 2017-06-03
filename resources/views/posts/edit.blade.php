@extends ('layouts.master')

@section ('content') 
	<form action="{{ action('PostController@update') }}" method="POST" accept-charset="utf-8">
		{{ csrf_field() }}
		<form>
		  <div class="form-group">
		    <label for="InputTitle">Post Title</label>
		    <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Post Title" value="{{$post->title}}">
		  </div>
		  <div class="form-group">
		    <label for="InputContent">Post Content</label>
		    <textarea name="content" class="form-control" id="InputContent" placeholder="Post Content">{{$post->content}}</textarea>
		  </div>
		  <input type="hidden" name="post_id" value="{{$post->id}}">
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</form>
@endsection	