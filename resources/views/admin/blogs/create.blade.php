@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3>Create Blog</h3>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-9" style="padding-bottom:120px">
                    @include('layouts.error')
                    @if( session('message_success') )
                        <div class="alert alert-success">
                            {{ session('message_success') }}
                        </div>
                    @endif
                    @if( session('message_error') )
                        <div class="alert alert-success">
                            {{ session('message_error') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="categories" class="form-control" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                            <label >Tag (max 5 tag)</label>
                            <input type="text" name="tags" class="form-control" data-role="tagsinput" >
                        </div>
                        
                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="title" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="content" name="content"  class="form-control ckeditor" rows="10" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                       
                        <input type="submit" class="btn btn-default" value="Create">
                        <input type="reset" class="btn btn-default" value="Refesh">
                    <form>
                </div>
            </div>
        </div>
    </div>
@endsection