@extends('auth.layouts.base')

@section('page')
    <div class="kt-login__container">
        <div class="kt-login__logo">
            <a href="#">
                <img src="{{asset('assets/media/logos/logo-nhandan-ads.png')}}" width="160"/>
            </a>
        </div>

        <div class="kt-login__forgot" style="display: block">
            <div class="kt-login__head">
                <h3 class="kt-login__title">Forgotten Password ?</h3>
                <div class="kt-login__desc">Enter your email to reset your password:</div>
            </div>

            <form class="kt-form" method="POST" action="{{ route('password.request.post') }}">
                @csrf

                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger" style = "font-family: serif; font-size:13px; padding: 10px">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="kt-login__actions">
                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                    <a href="{{route('login')}}" id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection

