@extends('layout')
@section('pagecontent')
<div class="o-login">
  <div class="m-left-image"></div>
  <form class="m-form__login" action="{{route('saveProject')}}" method="post" class="form-group">
    <h1 class="a-title-login">project maken</h1>
    @csrf
    <select class="a-input__login a-input__select" name="categorie" >
        @foreach($categories as $category)
          <option value='{{$category->id}}' >
            {{$category->categorie}}
          </option>
        @endforeach
    </select>

    <input name="naam" type="text" class="a-input__login" value="{{ old('naam') }}" placeholder="Naam van het project">

    <textarea name="uitleg" type="text" class="a-input__login a-input__textarea" placeholder="Een woordje uitleg over jou project" ></textarea>

    <input name="doelbedrag" type="number" placeholder="Geef een doelbedrag in" class="a-input__login" value="{{ old('doelbedrag') }}">

    <input name="deadline" type="date" class="a-input__login" placeholder="Wat is jou deadline">

    <div class="m-deal">
      <label class="a-label">Als de gebruiker</label>
      <input class="a-input__login" name="minimumbedrag" type="number" placeholder="geef een bedrag">
    </div>
    <div class="m-deal">
      <label class="a-label">doneert krijgt hij als souvenier</label>
      <input class="a-input__login" name="minimumsouvenir" type="tekst" placeholder="geef een vrijwillig souvenir">
    </div>

    <div class="m-deal">
      <label class="a-label">Als de gebruiker </label>
      <input class="a-input__login " name="maximumbedrag"type="number" placeholder="geef een bedrag">
    </div>
    <div class="m-deal">
      <label class="a-label">doneert krijgt hij als souvenier</label>
      <input  class="a-input__login" name="maximumsouvenir" type="tekst" placeholder="geef een vrijwillig souvenir">
    </div>

    <input class="a-button__login" value="Create" type="submit">
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <ul>
  
        <li>{{ $error }}</li>
  
      </ul>
    </div>
    @endforeach
  </div>
  </form>



@endsection