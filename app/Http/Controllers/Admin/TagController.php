<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function gettag()
    {
        $tags = Tag::paginate(7);
        return view('admin.tag.index', ['tags' => $tags]);
    }
    public function delete(Request $request)
    {
        $tag = Tag::find($request->id);
        $tag->delete();

        return redirect()->back()->with('success', 'Delete tag success');
    }
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tag.tag-update', compact('tag'));
    }
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.tag_get')->with('success', 'update tag success');
    }
    public function search(Request $req)
    {
        if ($req->keyword) {
            $tags = Tag::where('name', 'like', '%' . $req->keyword . '%')->paginate(10);
        } else {
            $tags = Tag::paginate(10);
        }

        return view('admin.ajax-view.search-tag', compact('tags'))->render();
    }
}
