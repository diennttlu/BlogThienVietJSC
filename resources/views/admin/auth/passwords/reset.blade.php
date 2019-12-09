@extends('auth.layouts.base')

@section('page')
<div class="kt-login__container">
    <div class="kt-login__logo">
        <a href="#">
            <img src="{{asset('assets/media/logos/logo-nhandan-ads.png')}}" width="160"/>
        </a>
    </div>
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Reset Password</h3>
        </div>
        {{--<form class="kt-form" method="POST" action="{{ route('password.update') }}">--}}
        <form class="kt-form" method="POST" action="{{ route('password.reset.post') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" required>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger" style = "font-family: serif; font-size:13px; padding: 10px">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif

            <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password" required>
            </div>

            <div class="input-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required>
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif

            <div class="kt-login__actions">
                <button type="submit" id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
