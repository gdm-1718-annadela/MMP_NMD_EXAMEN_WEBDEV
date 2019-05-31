@extends('layout')

@section('pagecontent')

<h1>News</h1>

@foreach($projects as $project)
<form action="{{ route ('detailProject', $project->id) }}">
<h2>{{ $project->naam }}</h2>
<button type="submit">detailpagina</button>
</form>
@endforeach
@endsection