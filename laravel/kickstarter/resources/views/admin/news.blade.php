@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
    <h1 class="a-title__table">Nieuws</h1>
    <div class="o-wrapper">
        <a class="a-create__project a-table__add" href="{{ route('createNews') }}"><i class="fas fa-plus"></i></a>
      <div class="m-table">
          <div class="row header">
              <div class="cell">Titel</div>
              <div class="cell">inhoud</div>
              <div class="cell">tekst</div>
              <div class="cell">slot</div>
              <div class="cell">edit</div>
              <div class="cell">delete</div>
          </div>

        @foreach ($news as $new) 
          <div class="row" id="user">
            <p class="cell">{{$new->titel}}</p>
            <p class="cell">{{$new->excerpt}}</p>
            <p class="cell">{{$new->tekst}}</p>
            <p class="cell">{{$new->slot}}</p>
            <a class="cell" href="{{ route('editNews', $new->id) }}"><i class="fas fa-edit"></i></a>
            <a class="cell" href="{{ route('deleteNews', $new->id) }}"><i class="fas fa-trash-alt"></i></a>
          </div>
        @endforeach
      </div>
    </div>
</div>

@endsection