@extends('layout')

@section('pagecontent')
<h1 class="a-title__projects">Projecten</h1>
@if(Auth::check())<a class="a-create__project--mobile" href="{{ route('createProject') }}"><i class="fas fa-plus"></i></a>@endif
<div class="m-projects">
    @if(Auth::check())
    <div class="m-project m-add__card">
    <div class="m-card">
      <div class="m-image__project">
        <img class="a-image" src="../images/background.jpg">
      </div>
      <h1 class="a-title__project">Voeg je eigen project toe!</h1>
      <a class="a-create__project" href="{{ route('createProject') }}"><i class="fas fa-plus"></i></a>
    </div>
  </div>
    @endif
  @foreach($projects as $project)
    <div class="m-project">
      <div class="m-card">
        @if($project->images->first()['path']== null)
        <div class="m-image__project">
          <img class="a-image" src="../images/background.jpg">
        </div>
        @else 
        <div class="m-image__project">
          <img class="a-image" src="{{ $project->images->first()['path'].'/'.$project->images->first()['title']}}">
        </div>
        @endif

        <h1 class="a-title__project">{{ $project->naam }}</h1>
        <p class="a-explaination__project">{{ str_limit($project->uitleg, 50) }}</p>
        <p class="a-explaination__project">vervalt op {{ \Carbon\Carbon::parse($project->gepubliceerd_tot)->format('d/m/Y') }}</p>

        <div class="m-bedrag__bar">
          <div class="m-donated__bar" style=" width: {{ $project->credits_gesubsideert / $project->credits_doelbedrag * 100}}%; background-color: #3A1B42; height: 20px;" >
          </div>
        </div>

      </div>

      <div class="m-buttons__projects">
        @if(Auth::check())
          @if($project->user_id == Auth::user()->id || Auth::user()->soortgebruiker == 'admin')
            <a class="a-edit__projects a-button__projects" href="{{ route('editProject', $project->id) }}">aanpassen</a>
            <a class="a-delete__projects a-button__projects"href=" {{ route('deleteProject', $project->id) }}">verwijder</a>
          @endif
        @endif
          <a class="a-detail__projects a-button__projects" href=" {{ route('detailProject', $project->id) }}">detail</a>
      </div>
    </div>
  @endforeach
</div>
@endsection
{{-- 
<p class="a-explaination__project">Gedoneerd: {{ $project->credits_gesubsideert }}</p>
<p class="a-explaination__project">Ons doelbedrag: {{ $project->credits_doelbedrag }} Credits!</p> --}}