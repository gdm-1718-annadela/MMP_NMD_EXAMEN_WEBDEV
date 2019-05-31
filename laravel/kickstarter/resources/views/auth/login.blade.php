@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form class="m-form__login" method="POST" action="{{ route('login') }}">
        <h1 class="a-title-login">Login</h1>
        @csrf
        <input id="email" type="email" class="a-input__login{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="gebruikersnaam" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <input id="password" type="password" class="a-input__login{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="wachtwoord" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="a-remember__login">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="a-text" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <button type="submit" class="a-button__login">
            {{ __('Login') }}
        </button>
        <div class="a-text__login">
            @if (Route::has('password.request'))
                <a class="login_forgot" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <a href="/register">ik heb nog geen account</a>
        </div>
    </form>
</div>
@endsection
