<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Notifications\CreatePost;
use Auth;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::whereHas('postUser', function ($query) {
            $query->where('role',  '<>' , 0);
        })->orderBy('id', 'DESC')->paginate(8);
        return view('admin.blogs.index', compact('blogs')); 
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(PostRequest $request)
    {   
        $user = Auth::guard('admin')->user();
        $categories = explode(",", $request->categories);
        $tags = explode(",", $request->tags);
        //dd($categories);
        if (count($tags) > 5) {
            return redirect()->back()->with('message_error', 'You have entered more than 5 tags');
        }
        $image = '';
        if ( $request->hasFile('image') ) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            while (file_exists('images/upload/blog/'.$image)) {
                $image = time()."_".$image;
            }
            $file->move("images/upload/blog", $image);
        }

        $post = Post::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'view'      => 0,
            'status'    => 1,
            'user_id'   => $user->id,
            'image'     => $image
        ]);
        saveCategory($categories, $post);
        saveTag($tags, $post);
        $user->notify(new CreatePost($post));
        
        return redirect()->back()->with('message_success', 'Blog created successfully');
    }

    public function edit($id)
    {
        $blog = Post::find($id);
        $comments = $blog->postComments()->paginate(10);
        return view('admin.blogs.edit', compact('blog', 'comments'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::guard('admin')->user();
        
        detachCategory($post->postCategories->toArray(), $post);
        detachTag($post->postTags->toArray(), $post);

        $categories = explode(",", $request->categories);
        $tags = explode(",", $request->tags);
        
        if (count($tags) > 5) {
            return redirect()->back()->with('message_error', 'You have entered more than 5 tags');
        }

        $image = '';
        if ( $request->hasFile('image') ) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            while (file_exists('images/upload/blog/'.$image)) {
                unlink('images/upload/blog/'.$image);
            }
            $file->move("images/upload/blog", $image);
        }

        $post->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'user_id'   => $user->id,
            'image'     => $image
        ]);

        saveCategory($categories, $post);
        saveTag($tags, $post);
        return redirect()->back()->with('message_success', 'Blog edited successfully');
    }

    public function destroy($id) {
        $blog = Post::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Delete category success');
    }

    public function search(Request $request)
    {
        $search_data = $request->search_data;
        $blogs = Post::whereHas('postUser', function ($query) {
            $query->where('role',  '<>' , 0);
        })->where('title', 'LIKE', '%'.$search_data.'%')->paginate(8);

        return \Response::json(\View::make('admin.blogs.data-table', array(
            'blogs' => $blogs
        ))->render());
    }
}
