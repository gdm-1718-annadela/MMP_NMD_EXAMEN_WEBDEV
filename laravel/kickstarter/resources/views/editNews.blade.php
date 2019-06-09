@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form action="{{route('updateNews' , $news->id)}}" class="m-form__login" method="post">
        <h1 class="a-title-login">Edit News</h1>
        @csrf
        <input type="text" class="a-input__login" name="titel" value="{{ $news->titel }}"placeholder="Titel" required autofocus>

        <textarea type="text" class="a-input__login" name="inleiding" placeholder="Geef een korte inleiding">{{$news->excerpt}}</textarea>

        <textarea type="text" class="a-input__login a-input__textarea" name="tekst" placeholder="geef jou nieuws" required>{{$news->tekst}}</textarea>

        <textarea type="text" class="a-input__login" name="slot" placeholder="geef een kort slot" >{{$news->slot}}</textarea>

        <button type="submit" class="a-button__login">
            {{ __('Plaats jouw nieuws') }}
        </button>
       
    </form>
</div>
@endsection
