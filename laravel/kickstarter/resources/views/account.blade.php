@extends('layout')

@section('pagecontent')

<div class="o-login">
    <div class="m-left-image"></div>
    <div class="m-form__account m-form__top">
        <h1 class="a-title-login">Account</h1>
        <div class="m-account__top">
            <div class="m-profielfoto">
                @if(Auth::user()->fototitel !== null)
                    <div class="a-image__account">
                        <img src="{{asset($userId->fotopad  . '/' . $userId->fototitel)}}">
                    </div>
                @else
                    <div class="a-image__account">
                        <img src="images/profile.png">
                    </div>
                @endif
                <form action="{{ route('profileImage', $userId) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="text" name="project_id" value="{{$userId}}" hidden>
                    <input onclick="myFunction()" class="m-square__account" type="file" name="file[]" id="file" multiple>
                    <button id="bevestig" type="submit" class="a-button__login a-button__account">
                        Bevestig profielfoto keuze
                    </button>
                </form>
            </div>
            <div class="m-tekst__pages">
                <p>Welkom {{ $userId->name }}</p>
                <p><i class="fas fa-at"></i> {{ $userId->email }}</p>
                <a href="/credits"><i class="fas fa-gem"></i> koop credits</a><br>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </div>
        </div>
        <div class="m-account__cards">
        @foreach($projects as $project)
            <div class="m-project__account">
                <div class="m-projecthead__account">
                    <h1 class="a-projectitel__account">{{ $project->naam }}</h1>
                    @if($project->images->first()['path']== null)
                        <div class="m-image__project">
                            <img class="a-image__account" src="../images/background.jpg">
                        </div>
                    @else 
                        <div class="m-image__project">
                            <img class="a-image__account" src="{{ $project->images->first()['path'].'/'.$project->images->first()['title']}}">
                        </div>
                    @endif
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
    </div>
</div>

<script>
    function myFunction(){
        let a = document.getElementById('bevestig');
        let b = document.getElementById('file');
        a.style.display = "block";
        b.style.display = "none";
    }
</script>
@endsection