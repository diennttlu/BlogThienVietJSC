<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Notifications\CreatePost;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Post;
use App\User;
use App\Category;
use App\Category_Post;
use App\Tag;
use App\Tag_Post;
use App\Vote;
use App\Follow;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $element_page = 5;
        $posts_vote= Post::whereHas('postVotes')->withCount('postVotes')->orderBy('post_votes_count', 'DESC')->take(5)->get();
        $categories = Category::all();
        $posts = Post::PostFilter($element_page);
        if ($request->ajax()) {
            if ($request->element_page) {
                $element_page = $request->element_page;
                $posts = Post::PostFilter($element_page);
            }
            if ($request->category_id) {
                $posts = Category::find($request->category_id)->categoryPosts()->PostFilter($element_page);
            }
            return \Response::json(\View::make('list-question', array(
                'posts' => $posts, 
            ))->render());
        }
        return view('index', compact('posts', 'posts_vote', 'categories'));
    }

    public function create()
    {
        return view('index');
    }

    public function store(PostRequest $request)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $categories = explode(",", $request->categories);
            $tags = explode(",", $request->tags);
            if(count($categories) > 5){
                return redirect()->back()->withErrors(['categories' => 'You must enter categories less than or equal to 5']);
            }
            if(count($tags) > 5){
                return redirect()->back()->withErrors(['tags' => 'You must enter tags less than or equal to 5']);
            }
            $post = Post::create([
                'title'     => $request->title,
                'content'   => $request->content,
                'user_id'   => $user->id
            ]);
            saveCategory($categories, $post);
            saveTag($tags, $post);
            $user->point += 2;
            $user->save();
            $user->notify(new CreatePost($post));
            session()->flash('message_success', 'Question created successfully');
            return redirect()->route('posts.index');
        } else {
            session()->flash('message_error', 'You must be logged in to create a question');
            return redirect()->route('posts.index');
        }
    }

    public function show($id)
    {
        $post = Post::find($id);

        if ($post->postUser->role != 0) {
            return redirect()->route('blogs.show', $id);
        }

        $post->view += 1;
        $post->save();

        return view('post-detail', compact('post'));
    }
    

    public function edit($id)
    {
        # code...
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();

        detachCategory($post->postCategories->toArray(), $post);
        detachTag($post->postTags->toArray(), $post);

        $categories = explode(",", $request->categories);
        $tags = explode(",", $request->tags);
        
        if (count($tags) > 5) {
            return view('profile')->with('message_error', 'You have entered more than 5 tags');
        }
        $post->update([
            'title'     => $request->title,
            'content'   => $request->content,
        ]);
        saveCategory($categories, $post);
        saveTag($tags, $post);
        session()->flash('message_success', 'Question updated successfully');
        return redirect()->route('customer.profile');
    }

    public function postSearch(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $posts = Post::where('title', 'LIKE', '%'.$search.'%')->paginate(10);

            return redirect()->route('posts.index')->with( ['posts' => $posts] );
        }
    }
}
