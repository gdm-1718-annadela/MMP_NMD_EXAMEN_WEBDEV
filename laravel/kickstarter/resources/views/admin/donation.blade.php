@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Donaties</h1>

  <div class="o-wrapper">
      <div class="m-table">
          <div class="row header">
              <div class="cell">Project id</div>
              <div class="cell">Gebruiker</div>
              <div class="cell">Donatie</div>
            </div>
            @foreach ($fundings as $fund) 
            <div class="row" id="user">
              <p class="cell">{{$fund->project_id}}</p>
              <p class="cell">{{$fund->user_name}}</p>
              <p class="cell">{{$fund->bedrag}}</p>
            </div>
          @endforeach
        </div>
          
      </div>
    </div>
</div>

@endsection