@extends('layout')
@section('pagecontent')
@include('admin')
<div class="m-table">
  <h1 class="a-title__table">Gebruikers</h1>
  <div class="o-wrapper">
      <div class="m-table">
        <div class="row header">
          <div class="cell">Gebruikers id</div>
          <div class="cell">Naam</div>
          <div class="cell">E-mail</div>
          <div class="cell">Credits</div>
          <div class="cell">Edit</div>
          <div class="cell">Delete</div>
        </div>

        @foreach ($users as $user) 
          <div class="row" id="user">
          <p class="cell">{{$user->id}}</p>
            <p class="cell">{{$user->name}}</p>
            <p class="cell">{{$user->email}}</p>
            <p class="cell">{{$user->credits}}</p>
            <a class="cell" href="{{ route('editUser', $user->id) }}"><i class="fas fa-edit"></i></a>
            <a class="cell" href="{{ route('deleteUser', $user->id) }}"><i class="fas fa-trash-alt"></i></a>
          </div>
        @endforeach
      </div>
    </div>
</div>

@endsection