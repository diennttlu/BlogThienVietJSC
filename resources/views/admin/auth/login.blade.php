@extends('admin.auth.layouts.base')
@section('page')
    <div class="kt-login__container">
        <div class="kt-login__logo">
            <a href="#">
                <img src="{{asset('assets/media/logos/logo-blog.png')}}" width="160"/>
            </a>
        </div>
        <div class="kt-login__signin">
            <div class="kt-login__head">
                <h3 class="kt-login__title">Sign In To Admin</h3>
            </div>
            <form class="kt-form" method="POST" action="{{ route('admin.login_post') }}">
                @csrf
                @if ($errors->has('login'))
                    <span class="text-danger" style = "font-family: serif;font-size:13px; padding: 10px">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                @endif
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Email" name="email" value="{{old('email')}}">
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger" style = "font-family: serif; font-size:13px; padding: 10px">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="input-group">
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger" style = "font-family: serif;font-size:13px; padding: 10px">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="kt-login__actions">
                    <button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>
@endsection

