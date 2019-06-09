@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form class="m-form__login" method="post" action="{{route('updateUser' , $user->id)}}">
        <h1 class="a-title-login">Gebruiker Aanpassen</h1>
        @csrf

        <input id="name" type="text" class="a-input__login {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Naam" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <input id="email" type="email" class="a-input__login{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="Email" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

       <button type="submit" class="a-button__login">
            {{ __('Wijzig gebruiker') }}
        </button>


    </form>
</div>
@endsection
