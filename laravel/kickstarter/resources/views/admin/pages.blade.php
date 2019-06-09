@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Pagina's</h1>

  <div class="o-wrapper">
      <div class="m-table">
          <div class="row header">
              <div class="cell">id</div>
              <div class="cell">titel</div>
              <div class="cell">tekst</div>
            </div>
            @foreach ($pages as $page) 
            <div class="row" id="user">
              <p class="cell">{{$page->id}}</p>
              <p class="cell">{{$page->titel}}</p>
              <p class="cell">{{$page->tekst}}</p>
            </div>
          @endforeach
        </div>
          
      </div>
    </div>
</div>

@endsection