@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Categorie</h1>

  <div class="o-wrapper">
      <a class="a-create__project a-table__add" href="{{ route('createCategorie') }}"><i class="fas fa-plus"></i></a>
      <div class="m-table">
          <div class="row header">
              <div class="cell">Categorie</div>
              <div class="cell">Verwijder</div>
            </div>
          @foreach ($categories as $categorie) 
            <div class="row" id="user">
              <p class="cell">{{$categorie->categorie}}</p>
              <a class="cell" href="{{ route('categoryDelete', $categorie->id) }}"><i class="fas fa-trash-alt"></i></a>
            </div>
          @endforeach
        </div>
          
      </div>
    </div>
</div>

@endsection