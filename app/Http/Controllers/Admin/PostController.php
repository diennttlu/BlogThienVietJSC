<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Notifications\ActivePost;
use Auth;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\Notification;
use App\Comments;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::whereHas('postUser', function ($query) {
            $query->where('role', 0);
        })->orderBy('id', 'DESC')->paginate(8);
        return view('admin.posts.index', compact('posts')); 
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.post-detail', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $post = Post::find($id);
        if ($user -> can('update', $post)) {

            detachCategory($post->postCategories->toArray(), $post);
            detachTag($post->postTags->toArray(), $post);

            $categories = explode(",", $request->categories);
            $tags = explode(",", $request->tags);
            
            if (count($tags) > 5) {
                return redirect()->back()->with('message_error', 'You have entered more than 5 tags');
            }

            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);

            saveCategory($categories, $post);
            saveTag($tags, $post);
            return redirect()->back()->with('message_success', 'Blog edited successfully');
        }
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Delete category success');
    }

    public function search(Request $request)
    {
        $search_data = $request->search_data;
        $posts = Post::whereHas('postUser', function ($query) {
            $query->where('role', 0);
        })->where('title', 'LIKE', '%'.$search_data.'%')->paginate(8);

        return \Response::json(\View::make('admin.posts.data-table', array(
            'posts' => $posts
        ))->render());
    }
    
    public function activePost(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $post = Post::find($request->post_id);
        $point = $post->postUser->point;
        if ($post->status == 0) {
            $status = 1;
            $point += 15;
            $html = '<span id="active_post" class="btn btn-outline-danger">Deactivated</span>';
        } else {
            $status = 0;
            $point -= 15;
            $html = '<span id="active_post" class="btn btn-outline-success">Activated</span>';
        }
        
        $post->update([
            'status' => $status
        ]);

        $post->postUser->update([
            'point' => $point
        ]);

        $notification = Notification::where('type', 'App\Notifications\ActivePost')->get()->filter(function($query) use ($request) {
            return $query->data['id'] == $request->post_id;
        })->first();
        if (!$notification) {
            User::find($post->user_id)->notify(new ActivePost($post));
        }
        return $html;
    }
}
