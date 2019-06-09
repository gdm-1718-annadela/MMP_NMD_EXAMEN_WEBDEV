@extends('layout')

@section('pagecontent')

<h1 class="a-project__naam a-margin-top">News</h1>
@if(Auth::check() && Auth::user()->soortgebruiker == 'admin')
<div class="m-projects">
  <div class="m-project m-add__card">
      <div class="m-card m-scroll" >
          <h3 class="a-news__title">Voeg nieuws hier toe!</h3>
          <a class="a-create__project" href="{{ route('createNews') }}"><i class="fas fa-plus"></i></a>
      </div>
  </div>

  @foreach($news->reverse()->slice(0, 3) as $new)
  <div class="m-project">
    <div class="m-card m-scroll" >
      <h3 class="a-news__title">{{$new->titel}}</h3>
      <p class="a-news__text a-news__introduction">{{$new->excerpt}}</p>
      <p class="a-news__text" >{{$new->tekst}}</p>
      <p class="a-news__text a-news__end">{{$new->slot}}</p>
    </div>
  </div>
  @endforeach
</div>
@else
  <div class="m-projects">
    @foreach($news->reverse()->slice(0, 4) as $new)
    <div class="m-project">
      <div class="m-card m-scroll" >
        <h3 class="a-news__title">{{$new->titel}}</h3>
        <p class="a-news__text a-news__introduction">{{$new->excerpt}}</p>
        <p class="a-news__text" >{{$new->tekst}}</p>
        <p class="a-news__text a-news__end">{{$new->slot}}</p>
      </div>
    </div>
    @endforeach
  </div>
@endif

@if($mustsee->first())
<h1 class="a-project__naam a-margin-top">In de kijker!</h1>
@endif
<div class="m-projects">
  @foreach($mustsee as $project)
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

<h1 class="a-project__naam a-margin-top">HotDeals!</h1>
<div class="m-projects">
  @foreach($projects->slice(0, 8) as $project)
    @if($project->credits_gesubsideert > $project->credits_doelbedrag*80/100 )
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
    @endif
  @endforeach
</div>


@endsection