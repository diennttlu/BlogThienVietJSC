<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Notifications\CreateComment;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;
use App\Post;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $user = Auth::user();
        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => $user->id,
            'post_id' => $request->post_id
        ]);
        $post = Post::find($request->post_id);
        if($user->id != $post->user_id) {
            User::find($post->user_id)->notify(new CreateComment($comment));
        }
        $view = view('list-comment', compact('comment'))->render();
        return response()->json([
            'view' => $view,
            'count_comment' => count($post->postComments)." comments"
        ]);
    }

    public function edit(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        return \Response::json(\View::make('form-comment', array(
            'comment' => $comment
        ))->render());
    }

    public function update(CommentRequest $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->content = $request->content;
        $comment->save();
        
        return $comment->content;
    }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->id);
        $post = Post::find($request->post_id);
        if (Auth::check()) {
            if (Auth::user()->can('delete', $comment) || $user->can('delete', $post)) {
                $comment->delete();
                $post = Post::find($request->post_id);
                return response()->json([
                    'count_comment' => count($post->postComments)." comments"
                ]);
            } 
        } 
    }
}
