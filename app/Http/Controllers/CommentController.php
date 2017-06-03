<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
            'content' => 'required|max:255',
            'post_id' => 'required',
        ]);

    	$newComment = new Comment();

        $newComment->user_id = Auth::user()->id;
        $newComment->post_id = $request->post_id;
        $newComment->content = $request->content;
        
        if (!$newComment->save()) {
            flash('Comment create error!')->alert();
        }

        flash('Comment created!')->success();

        return back();		
    }

    public function destroy(Request $request)
    {
    	$this->validate($request, [
            'comment_id' => 'required',
        ]);

       $comment = Comment::find($request->comment_id);
       
       if (!$comment->delete()) {
            flash('Comment delete error!')->alert();
       }

       flash('Comment deleted!')->success();
       return back();
    }
}
