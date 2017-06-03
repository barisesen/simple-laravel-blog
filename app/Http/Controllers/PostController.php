<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::All();

        return view('posts.index')->with(compact('posts'));
    }

    public function new()
    {
        return view('posts.new');
    }

    public function store(Request $request)
    {
        $newPost = new Post();

        $newPost->user_id = Auth::user()->id;
        $newPost->content = $request->content;
        $newPost->title   = $request->title;
        
        if (!$newPost->save()) {
            flash('Post create error!')->alert();
            return back();
        }

        flash('Post created!')->success();

        return redirect()->action('PostController@index');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with(compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with(compact('post'));
    }

    public function update(Request $request)
    {   
        $post = Post::find($request->post_id);
        $post->title = $request->title;
        $post->content = $request->content;
        if ($post->save()) {
            flash('Post updated!')->success();
        } else {
            flash('Post updated error')->alert();
            return back();
        }

        return redirect()->action('PostController@index');
    }

    public function destroy(Request $request)
    {
       
       $post = Post::find($request->post_id);
       if (!$post->delete()) {
            flash('Post delete error!')->alert();
            return back();
       }

       flash('Post deleted!')->success();
       return redirect()->action('PostController@index');    
    }
}
