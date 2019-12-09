@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Update Account
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @if( session('sussces'))
                <div class="alert alert-danger">
                    {{ session('sussces') }}
                </div>
            @endif
            <div class="row">
                <form action="{{ route('admin.account_postEditMyProfile', $user->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="full_name" aria-describedby="emailHelp" value="{{ $user->full_name }}">
                        <small id="emailHelp" class="form-text text-muted">
                            @if($errors->has('full_name'))
                                <p style="color: red;">
                                    {{ $errors->first('full_name') }}
                                </p>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Location</label>
                        <input type="text" class="form-control" name="location" id="exampleInputPassword1" value="{{ $user->location }}">
                        @if($errors->has('location'))
                            <p style="color: red;">
                                {{ $errors->first('location') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">mô tả</label>
                        <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{ $user->description }}">
                        @if($errors->has('description'))
                            <p style="color: red;">
                                {{ $errors->first('description') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sel1">email public:</label>
                        <select class="form-control" name="public" id="sel1">
                            <option value="1">public</option>
                            <option value="0">private</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputPassword1">
                        @if($errors->has('image'))
                            <p style="color: red;">
                                {{ $errors->first('image') }}
                            </p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection