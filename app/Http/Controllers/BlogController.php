<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::whereHas('postUser', function ($query) {
            $query->where('role', '<>', 0);
        })->paginate(5);
        return view('blog', compact('blogs'));
    }

    public function show($id)
    {
        $post =  Post::findOrfail($id);
        return view('blog-detail', compact('post'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        # code...
    }
}
