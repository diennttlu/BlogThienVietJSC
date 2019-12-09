<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tag;
use App\Tag_Post;
use App\Post;
use Illuminate\View\View;

class TagController extends Controller
{
    public function show(Request $req)
    {
        $tags_popular = Tag::withCount('tagPosts')->orderBy('tag_posts_count', 'DESC')->take(5)->get();
        if (isset($req->search)) {
            $search = $req->search;
            $tags = Tag::where('name', 'like', "%$search%")->get()->toArray();
            return view('tag', compact('tags', 'tags_popular'));
        } else {
            foreach (range('A', 'Z') as $i) {
                $tag = Tag::where('name', 'like', "$i%")->get()->toArray();
                if ($tag) {
                    $alltags[$i] = $tag;
                }
            }
            return view('tag', compact('alltags', 'tags_popular'));
        }
    }
    public function detail(Request $request)
    {
        $tag = Tag::find($request->id);
        $data = DB::select("select posts.id,posts.title,posts.content,posts.created_at,posts.id FROM tag_post,posts WHERE posts.id = tag_post.post_id AND tag_post.tag_id=$request->id");
        echo    '<div class="list-questions">';
        echo        '<div class="item-question">';
        echo        '<h3 class="mb-3">#' . $tag['name'] . '</h3>';
        foreach ($data as $post) {
            $route = route('posts.show', ['id' => $post->id]);
            $time = explode(" ", $post->created_at);
            $date = $time[0];
            $hour = $time[1];
            echo            '<div class="head-question">';
            echo                '<h4 class="question"><a href="'. $route .'">' . $post->title . '</a></h4>';
            echo            '</div>';
            echo            '<p class="text">' . $post->content . '</p>';
            echo            '<div class="date-time-comment">';
            echo                '<span class="date">' . $date . '</span>';
            echo                '<span class="time">' . $hour . '</span>';
            echo            '</div>';
        }
        echo        '</div>';
        echo    '</div>';
    }
    public function search(Request $req)
    {
        $keysearch = $req->keyword;
        $output = '';
        if ($keysearch != "") {
            $data = Tag::where('name', 'like', "$keysearch%")->get()->toArray();
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute;top:35px;
            width:84%">';
            if (!empty($data)) {
                foreach ($data as $rows => $value) {
                    $link = route('tag.detail');
                    $output .= '<li><a href="javacript:void(0)" class="tag-id" data-id="' . $value['id'] . '"data-url="' . $link . '">' . $value['name'] . '</a></li>';
                }
            } else {
                $output .= '<li><a href="#">Không có kết quả phù hợp</a></li>';
            }
            $output .=  '</ul>';
        }
        return $output;
    }
}
