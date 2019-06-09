@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Projecten</h1>
  <div class="o-wrapper">
      <a class="a-create__project a-table__add" href="{{ route('createProject') }}"><i class="fas fa-plus"></i></a>
      <div class="m-table">
        <div class="row header">
            <div class="cell">Project id</div>
            <div class="cell">Naam</div>
            <div class="cell">Uitleg</div>
            <div class="cell">Gesponsord</div>
            <div class="cell">Doelbedrag</div>
            <div class="cell">Deal1</div>
            <div class="cell">Deal2</div>
            <div class="cell">In de kijker</div>
            <div class="cell">Edit</div>
            <div class="cell">Delete</div>
        </div>

        @foreach ($projects as $project)
      <div class="row">
        <p class="cell">{{$project->id}}</p>
        <p class="cell">{{$project->naam}} </p>
        <p class="cell">{{$project->uitleg}}</p>
        <p class="cell">{{$project->credits_gesubsideert}}</p>
        <p class="cell">{{$project->credits_doelbedrag}}</p>
        @if($project->minimumbedrag == 0)
        <p class="cell">Geen deal</p>
        @else
        <p class="cell">voor {{$project->minimumbedrag}} krijgen ze {{$project->minimumsouvenir}}</p>
        @endif
        @if($project->maximumbedrag == 0)
        <p class="cell">Geen deal</p>
        @else
        <p class="cell">voor {{$project->maximumbedrag}} krijgen ze{{$project->maximumsouvenir}}</p>
        @endif
        <p class="cell">{{$project->kijker}}</p>
        <a class="cell" href="{{ route('editProject', $project->id) }}"><i class="fas fa-edit"></i></a>
        <a class="cell" href="{{ route('deleteProject', $project->id) }}"><i class="fas fa-trash-alt"></i></a>
      </div>
      @endforeach
      </div>
    </div>
</div>

@endsection