@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Create Account
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
                <form action="{{ route('admin.account_postCreate') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="full_name" aria-describedby="emailHelp" placeholder="Enter name">
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
                    <input type="text" class="form-control" name="location" id="exampleInputPassword1" placeholder="Location">
                        @if($errors->has('location'))
                            <p style="color: red;">
                                {{ $errors->first('location') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">
                            @if($errors->has('email'))
                                <p style="color: red;">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password:</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="passwordAdmin" aria-describedby="emailHelp" placeholder="Enter password">
                        <small id="emailHelp" class="form-text text-muted">
                            @if($errors->has('passwordAdmin'))
                                <p style="color: red;">
                                    {{ $errors->first('passwordAdmin') }}
                                </p>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Repassword:</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="repasswordAdmin" aria-describedby="emailHelp" placeholder="Enter password">
                        <small id="emailHelp" class="form-text text-muted">
                            @if($errors->has('repasswordAdmin'))
                                <p style="color: red;">
                                    {{ $errors->first('repasswordAdmin') }}
                                </p>
                            @endif
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection