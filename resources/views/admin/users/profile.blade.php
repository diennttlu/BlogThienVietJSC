@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    User Profile
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-6">
                    <label for="">Full Name: </label>
                    <div class="form-control">
                        {{ $user->full_name }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Email: </label>
                    <div class="form-control">
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Location: </label>
                    <div class="form-control">
                        {{ $user->location }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Point: </label>
                    <div class="form-control">
                        {{ $user->point }} <i class="fa fa-star" aria-hidden="true" style="color:blue;"></i>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="">Description: </label>
                    <div class="form-control">
                        {{ $user->description }}
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="">Image: </label>
                    <div >
                        <img src="{{ URL::to('/') }}/images/icon/{{ $user->image }}" >
                    </div>
                </div>
                @if (Auth::guard('admin')->user()->role != 2)
                    <div class="col-lg-12 text-center mt-5">
                        <a class="btn btn-lg btn-success" href="{{ route('admin.account_createChangepassword', ['id' => $user->id]) }}">Change password</a>
                        <a class="btn btn-lg btn-success" href="{{ route('admin.account_editmyprofile', ['id' => $user->id]) }}">Edit myProfile</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection