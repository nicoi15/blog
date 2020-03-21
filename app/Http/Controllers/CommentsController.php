<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function comment(Request $request, $post_id)
    {
        $this->validate($request, [
            'comment' => 'required',
            'email' => 'required',
            'name' => 'required'
        ]);

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->email = $request->email;
        $comment->name = $request->name;
        $comment->post_id = $post_id;

        $comment->save();

        return redirect()->back()->with('success', 'Your comment has been posted');
    }
}
