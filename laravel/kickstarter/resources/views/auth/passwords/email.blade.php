@extends('layout')
@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>        
    <form class="m-form__login" method="POST" action="{{ route('password.email') }}">
        <h1 class="a-title-login">{{ __('Reset Password') }}</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <input id="email" type="email" class="a-input__login{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Geef jou email" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <button type="submit" class="a-button__login">
            {{ __('Send Password Reset Link') }}
        </button>
    </div>
</div>
@endsection
