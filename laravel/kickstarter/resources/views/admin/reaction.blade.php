@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Reacties</h1>

  <div class="o-wrapper">
      <div class="m-table">
          <div class="row header">
              <div class="cell">id</div>
              <div class="cell">reactie</div>
              <div class="cell">project_id</div>
              <div class="cell">user_id</div>
              <div class="cell">delete</div>
            </div>
          
      @foreach ($reactions as $reaction) 
      <div class="row" id="user">
        <p class="cell">{{$reaction->id}}</p>
        <p class="cell">{{$reaction->reactie}}</p>
        <p class="cell">{{$reaction->project_id}}</p>
        <p class="cell">{{$reaction->user_id}}</p>
        <a class="cell" href="{{ route('reactionDelete', $reaction->id) }}"><i class="fas fa-trash-alt"></i></a>
      </div>
    @endforeach
        </div>
          
      </div>
    </div>
</div>

@endsection