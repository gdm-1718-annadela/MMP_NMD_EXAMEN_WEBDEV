@extends('../layout')

@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <form class="m-form__login" method="POST" action="{{ route('saveCategorie') }}">
        <h1 class="a-title-login">Maak een nieuwe categorie aan</h1>
        @csrf
        <input type="text" class="a-input__login" name="categorie" placeholder="Categorie" required autofocus>

        <button type="submit" class="a-button__login">
            {{ __('Maak aan') }}
        </button>
       
    </form>
</div>
@endsection
