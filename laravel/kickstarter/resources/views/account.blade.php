@extends('layout')

@section('pagecontent')

<h1>Account</h1>
@foreach($projects as $project)
{{ $project->naam }}<br>
@endforeach
<a href="/home">Afmelden</a>
<a href="/credits">koop credits</a>

<form action="{{ route('profileImage', $userId) }}" method="post" enctype="multipart/form-data" class="form-group">
  <h3 class=" mb-3"> Voeg foto's toe aan uw project</h3>
  @csrf
  <div class="field">
      <div class="control">
          <input class="form-control" type="text" name="project_id"
              value="{{$userId}}" hidden>
      </div>
  </div>
  <table class="table is-striped">
      <tbody>
          <tr>
              <td>
                  <input type="file" name="file[]" id="file"  multiple>
              </td>
          </tr>
      </tbody>
  </table>
  <button type="submit" class="form-control btn btn-primary">
      Verzenden
  </button>

@endsection