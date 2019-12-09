<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Contact;
use App\User;
use App\Category;
class DashbroadController extends Controller
{
    public function index() {
        $tags = Tag::all();
        $posts = Post::whereHas('postUser', function ($query) {
            $query->where('role', 0);
        })->get();
        $blogs = Post::whereHas('postUser', function ($query) {
            $query->where('role', '!=', 0);
        })->get();
        $categories = Category::all();
        $contacts = Contact::all();
        $users = User::all();
        return view('admin.index', compact('tags', 'posts', 'blogs', 'categories', 'users', 'contacts'));
    }
}
