@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form class="m-form__login" method="POST" action="{{ route('saveNews') }}">
        <h1 class="a-title-login">Make News</h1>
        @csrf
        <input type="text" class="a-input__login" name="titel" placeholder="Titel" required autofocus>

        <textarea type="text" class="a-input__login" name="inleiding" placeholder="Geef een korte inleiding"></textarea>

        <textarea type="text" class="a-input__login a-input__textarea" name="tekst" placeholder="geef jou nieuws" required></textarea>

        <textarea type="text" class="a-input__login" name="slot" placeholder="geef een kort slot" ></textarea>

        <button type="submit" class="a-button__login">
            {{ __('Plaats jouw nieuws') }}
        </button>
       
    </form>
</div>
@endsection
