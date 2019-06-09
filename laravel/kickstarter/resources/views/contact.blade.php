@extends('layout')

@section('pagecontent')

<div class="o-login">
    <div class="m-left-image"></div>
    <div class="a-contact">
      <form action={{route('contactmail')}} method="post" class="m-form__login">


          <h1 class="a-title-login">{{ $page->titel }}</h1>
          <div class="a-contact">{!! $page->tekst !!}</div>
          @if(Auth::check())
        @csrf
        <input class="a-input__login" type="text" name="mailtitel" placeholder="titel">
        <textarea class="a-input__login a-input__textarea" name="mailemail" placeholder="schrijf jou boodschap"></textarea><br>

        <button class="a-button__login" type="submit">Verstuur mail</button>
      @endif
    </form>
    </div>
</div>
@endsection