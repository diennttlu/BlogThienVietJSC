@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Edit Banner
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.layouts.errors')
                    <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content: </label>
                            <textarea name="content" class="form-control" rows="10">{{ $banner->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image: </label>
                            <br>
                            <img src="{{ asset('images/banners/' . $banner->image) }}" alt="image banner">
                            <input type="file" name="image" class="form-control" style="margin-top: 15px;">
                        </div>
                        <div class="form-group">
                            <select name="status" style="width: 200px;">
                                <option value="0" {{ $banner->status ? '' : 'selected' }}>Hide</option>
                                <option value="1" {{ $banner->status ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection