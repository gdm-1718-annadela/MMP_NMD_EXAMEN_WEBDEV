@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form class="m-form__login" method="POST" action="{{ route('register') }}">
        <h1 class="a-title-login">Registreer</h1>
        @csrf

        <input id="name" type="text" class="a-input__login {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Naam" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <input id="email" type="email" class="a-input__login{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <input id="password" type="password" class="a-input__login{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Wachtwoord" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <input class="a-input__login" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Wachtwoord bevestigen" required>

        <input id="age-confirm" type="date" class="a-input__login" name="leeftijd" required>

        @if ($errors->has('leeftijd'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('leeftijd') }}</strong>
            </span>
        @endif

        <button type="submit" class="a-button__login">
            {{ __('Register') }}
        </button>
        
        <div class="a-text__login"></div>
            <a href="/login">Ik heb al een account</a>
        </div>


    </form>
</div>
@endsection
