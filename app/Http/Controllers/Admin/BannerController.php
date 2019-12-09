<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::paginate(10);

        return view('admin.banners.index', compact('banners'));
    }

    public function create() {
        return view('admin.banners.create');
    }

    public function store(BannerRequest $request) {
        $status = $request->status ? 1 : 0;
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();

        if (file_exists(config('image.image') . $image_name)) {
            $image_name = time() . $image_name;
        }

        $image->move(config('image.image'), $image_name);

        Banner::create([
            'content' => $request->content,
            'image'   => $image_name,
            'status'  => $status
        ]);

        return redirect()->route('admin.banner')->with('success', 'Create Banner Success');
    }

    public function edit($id) {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerUpdateRequest $request, $id) {
        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();

            if (file_exists(config('image.image') . $image_name)) {
                $image_name = time() . $image_name;
            }

            $image->move(config('image.image'), $image_name);

            if (file_exists(config('image.image') . $banner->image)) {
                unlink(config('image.image') . $banner->image);
            }

            $banner->update([
                'image' => $image_name
            ]);
        }

        $banner->update([
            'content' => $request->content,
            'status'  => $request->status
        ]);

        return redirect()->route('admin.banner')->with('success', 'Update Banner Success');
    }

    public function delete($id) {
        $banner = Banner::findOrFail($id);

        if (file_exists(config('image.image') . $banner->image)) {
            unlink(config('image.image') . $banner->image);
        }

        $banner->delete();

        return redirect()->back()->with('success', 'Delete Banner Success');
    }

    public function ajax(Request $request)
    {
        $banner = Banner::findOrFail($request->id);
        $status = 'active';
        if ($banner->status) {
            $banner->status = 0;
            $status = '';
        } else {
            $banner->status = 1;
        }

        $banner->save();

        return response()->json($status);
    }
}
