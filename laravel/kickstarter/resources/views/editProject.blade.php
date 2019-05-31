@extends('layout')
@section('pagecontent')
<div class="o-login">
  <div class="m-left-image"></div>
  <form action="{{route('updateProject' , $project->id)}}" method="post" class="m-form__login">
    <h1 class="a-title-login">project aanpassen</h1>
    @csrf
    @method("PATCH")
    <select name="categorie" class="a-input__login a-input__select" >
      @foreach($categories as $category)
        <option @if($project->categorie_id == $category->id) selected @endif
        value='{{$category->id}}' >
          {{ ucfirst($category->categorie) }}
        </option>
      @endforeach
    </select>

    <input name="naam" type="text" class="a-input__login" value="{{ $project->naam }}" placeholder="project naam">

    <textarea name="uitleg" type="text" class="a-input__login a-input__textarea" placeholder="Een woordje uitleg over jou project">{{ $project->uitleg }}</textarea>
    
    <input name="doelbedrag" type="number" placeholder="Geef een doelbedrag in" class="a-input__login" value="{{ $project->credits_doelbedrag }}">
    
    <input name="deadline" type="date" class="a-input__login" value="{{ $project->gepubliceerd_tot }}" >

    <div class="m-deal">
      <label class="a-label">Als de gebruiker</label>
      <input class="a-input__login" name="minimumbedrag" type="number" placeholder="geef een bedrag" value="{{ $project->minimumbedrag }}">
    </div>
    <div class="m-deal">
      <label class="a-label">doneert krijgt hij als souvenier</label>
      <input class="a-input__login" name="minimumsouvenir" type="tekst" placeholder="geef een vrijwillig souvenir" value="{{ $project->minimumsouvenir }}">
    </div>

    <div class="m-deal">
      <label class="a-label">Als de gebruiker </label>
      <input class="a-input__login " name="maximumbedrag"type="number" placeholder="geef een bedrag" value="{{ $project->maximumbedrag }}">
    </div>
    <div class="m-deal">
      <label class="a-label">doneert krijgt hij als souvenier</label>
      <input  class="a-input__login" name="maximumsouvenir" type="tekst" placeholder="geef een vrijwillig souvenir" value="{{ $project->maximumsouvenir }}">
    </div>

    <input value="Pas Aan" class="a-button__login" type="submit">

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
          <li>{{ $error }}</li>
        </ul>
      </div>
    @endforeach
  </form>
</div>
@endsection