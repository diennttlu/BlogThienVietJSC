@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <p>User List</p>
                    <div class="form-group" style="width: 100%">
                        <input id="myInput" type="text" name="search_user" data-url="{{ route('admin.account.ajax_name') }}" placeholder="Enter user search...." class="form-control" />
                    </div>
                </div>
                @if(Auth::guard('admin')->user()->role==2)
                <div class="kt-subheader__toolbar">
                    <a href="{{ route('admin.account_create') }}" title="Add User" class="btn btn-success btn-lg">Add Users</a>
                </div>
                 @endif
            </div>
        </div>
        @if( $errors->has('rpErrorCreate'))
            <div class="alert alert-danger">
                {{ $errors->first('rpErrorCreate') }}
            </div>
        @endif
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row" id="myTable">
                @foreach ($users as $user)
                    <div id="item" class="col-lg-4" style="margin-bottom: 20px">
                        <div class="form-group">
                            <div style="width: 35%; display: inline-block; float: left">
                                <label>Full Name: </label>
                                <p>{{ $user->full_name }}</p>
                                <label>Role: </label>
                                <p>
                                    @if( $user->role == 0)
                                        Client
                                        <i class="fa fa-star" aria-hidden="true" style="color:blueviolet"></i>
                                    @else
                                        Admin
                                        <i class="fa fa-star" aria-hidden="true" style="color:black;"></i>
                                    @endif

                                </p>
                            </div>
                            <div style="width: 65% ; display: inline-block; float: left">
                                <img class="rounded-circle" src="{{ URL::to('/') }}/images/icon/{{ $user->image }}" width="100px" height="100px" title="{{$user->description}}">
                            </div>
                        </div>
                        @if (Auth::guard('admin')->user()->can('changePassword', $user))
                            <div class="form-group" style="clear: both;">
                                <a href="{{ route('admin.account_createChangepassword', ['id' => $user->id]) }}">Change password</a>
                            </div>
                            <div class="form-group" style="clear: both;">
                                <a href="{{ route('admin.account_editAdmin', ['id' => $user->id]) }}">Edit</a>
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="text-center col-lg-12">{{$users->links()}}</div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/pages/search-admin.js') }}" type="text/javascript"></script>
@endsection