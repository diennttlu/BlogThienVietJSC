@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Create Banner
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.layouts.errors')
                    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content: </label>
                            <textarea name="content" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image: </label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-check form-group">
                            <input type="checkbox" class="form-check-input" name="status" value="1">
                            <label class="form-check-label">Status</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection