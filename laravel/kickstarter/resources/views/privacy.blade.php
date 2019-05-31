@extends('layout')

@section('pagecontent')
<h1 class="titel">{{ $page->titel }}</h1>
{!! $page->tekst !!}

@endsection