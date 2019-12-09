<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use  App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category')->with('success', 'Update cateogry success');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('success', 'Delete category success');
    }

    public function search(Request $request) {
        if ($request->search) {
            $categories = Category::where('name', 'like', '%'.$request->search.'%')->paginate(10);
        } else {
            $categories = Category::paginate(10);
        }

        return view('admin.ajax-view.search-category', compact('categories'))->render();
    }
}
