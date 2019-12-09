<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories_details = null;

        foreach (range('A', 'Z') as $i){
            $category =Category::where('name', 'like', "$i%")->get()->toArray();

            if($category){
                $categories[$i] = $category;
            }
        }

        $categories_populars = Category::withCount('categoryPosts')->orderBy('category_posts_count', 'DESC')->take(5)->get();

        if ($request->search) {
            $categories_details = Category::where('name', 'like', '%' . $request->search . '%')->get();

        }

        return view('categories.index', compact('categories', 'categories_populars', 'categories_details'));
    }

    public function show($id) {
        $posts = Category::findOrFail($id)->categoryPosts()->paginate(10);

        return view('categories.show', compact('posts'));
    }

    public function point() {
        $badges = User::where('role', 0)->orderBy('point', 'DESC')->paginate(10);
        
        return view('categories.point',compact('badges'));
    }
}