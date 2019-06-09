@extends('layout')

@section('pagecontent')

<div class="o-login">
  <div class="m-left-image"></div>
  <div class="m-form__login a-privacy">
    <h1 class="a-title-login">{{ $page->titel }}</h1>
    <div class="m-tekst__pages">{!! $page->tekst !!}</div>

  </div>
</div>

@endsection