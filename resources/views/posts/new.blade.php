@extends ('layouts.master')

@section ('content') 
	<form action="{{ action('PostController@store') }}" method="POST" accept-charset="utf-8">
	  {{ csrf_field() }}
	  <div class="form-group">
	    <label for="InputTitle">Post Title</label>
	    <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Post Title">
	  </div>
	  <div class="form-group">
	    <label for="InputContent">Post Content</label>
	    <textarea name="content" class="form-control" id="InputContent" placeholder="Post Content"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
@endsection	