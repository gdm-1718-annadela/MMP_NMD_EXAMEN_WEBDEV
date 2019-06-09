@extends('layout')
@section('pagecontent')
@include('admin')

<div class="m-table">
  <h1 class="a-title__table">Afbeeldingen</h1>

  <div class="o-wrapper">
      <div class="m-table">
          <div class="row header">
              <div class="cell">bestandpad</div>
              <div class="cell">bestandsnaam</div>
              <div class="cell">Link naar foto</div>
              <div class="cell">Delete</div>
            </div>

            @foreach ($images as $image) 
            <div class="row" id="user">
              <p class="cell">{{$image->path}}</p>
              <a class="cell" href="{{asset($image->path  . '/' . $image->title)}}">{{$image->title}}</a>
              <p class="cell">{{$image->id}}</p>
              <a class="cell" href="{{ route('imageDelete', $image->id) }}"><i class="fas fa-trash-alt"></i></a>
            </div>
          @endforeach
      </div>
    </div>
</div>

@endsection