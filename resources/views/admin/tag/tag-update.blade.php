@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.layouts.errors')
                    <form action="{{ route('admin.tag_update',['id' => $tag->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tag Name: </label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $tag->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection