@extends('layout')

@section('pagecontent')

<h1>Contact</h1>

<form action={{route('contactmail')}} method="post">
  @csrf
  <label>titel</label><br>
  <input type="text" name="mailtitel"><br>

  <label>mail</label><br>
  <textarea name="mailemail"></textarea><br>

  <button type="submit">verzenden</button>
</form>
@endsection