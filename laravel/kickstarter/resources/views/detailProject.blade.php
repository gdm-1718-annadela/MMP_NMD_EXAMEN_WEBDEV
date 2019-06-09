@extends('layout')
@section('pagecontent')
<div class="o-login o-detail">
    <div class="m-left-images" id="myImages">
        @foreach($images as $image)
            <form action="{{ route('imageDelete', $image->id) }}" class="my_images">
                @csrf
                @if($images !== null)

                    @if(Auth::check())
                        @if($project->user_id == Auth::user()->id || Auth::user()->soortgebruiker == 'admin')
                            <input type="text" name="filepath" value="{{$image->path}}" hidden>
                            <input type="text" name="filename" value="{{$image->title}}" hidden>
                            <button class="m-button__deleteimage"type="submit"><i class="fas fa-trash-alt"></i></button>
                        @endif
                    @endif
                    <div class="a-image__detail">
                        <img src="{{asset($image->path  . '/' . $image->title)}}">
                    </div>
                @endif
            </form>
        @endforeach
    </div>
    <div class="m-left-images m-left-noflex" id="myReactions">
        <form method="post" class="reactieformulier" action="{{ route('reactieUpload', $project->id) }}">
            <h1 class="a-title-login a-margin-left">Reacties</h1>
            @csrf
            @if(Auth::check())
                @if($project->user_id !== Auth::user()->id)
                    <h1 class="a-project__naam">reactie plaatsen</h1>
                    <input type="text" value="{{ $project->id}}" name="project_id" hidden>
                    <textarea class="a-input__reactie"  name="reactie" type="text"></textarea><br>
                    <button class="a-button__login" type="submit">post reactie</button>
                @endif
            @endif
        </form>

        @foreach($reacties as $reactie)
        <p class="a-reactions">{{ $reactie->reactie }}</p>
        @endforeach
    </div>
    <div class="m-left-images m-left-noflex" id="myDonations">
            <h1 class="a-title-login a-margin-left">Sponsoring</h1>
        @foreach($fundhistory as $fund)
            <p class="a-reactions">{{$fund->user_name}} heeft {{ $fund->bedrag}} credits gedoneerd</p>
        @endforeach
    </div>
    <div class="m-details">
        <div class="m-project__header">
            <h1 class="a-project__naam">{{ $project->naam }}</h1>
            @if(Auth::check())<p class="a-project__text">{{ $projectcreater->name }}</p>@endif
        </div>
        <p class="a-project__text">categorie: {{ $categorie }}</p>
        <p class="a-project__text">{{ $project->uitleg }}</p>
        <div class="m-project__header">
                <p class="a-project__text">Sponsoring: 
                    @if($project->credits_gesubsideert > 0)
                    {{ $project->credits_gesubsideert }} credits</p>
                    @else
                    0 credits
                    @endif
                <p class="a-project__text">Doelbedrag: {{ $project->credits_doelbedrag }} credits</p>
        </div>
        <div class='m-fullbar m-shadow' >
            <div class="m-donatedbar m-shadow" style=" width: {{$project->credits_gesubsideert / $project->credits_doelbedrag *100}}%; background-color: #3A1B42; height: 30px;">
            </div>
        </div>

        @if(Auth::check() && $project->user_id !== Auth::user()->id)
            <h1 class="a-project__naam a-project__donation">Doneer credits!</h1>
            <div class="m-donate">
                @if($project->minimumbedrag !== null)
                    <p>al je meer dan {{ $project->minimumbedrag }} doneert krijg je {{ $project->minimumsouvenir}}</p>
                @endif
                @if($project->maximumbedrag !== null)
                    <p>als je meer dan {{ $project->maximumbedrag }} doneert krijg je {{ $project->maximumsouvenir }}</p>
                @endif
            </div>
            <form action=" {{ route('donateProject', $project->id) }} ">
                <input class="a-project__donate" type="number" name="donate">
                <button class="a-button__login a-button__width" type="submit">donate credits</button>
            </form>
        @endif

        <div class="m-project__header a-project__width">
            <a class="a-project__links" href="{{ route('pdfmaker', $project->id) }}" >Download pdf</a>
            <button class="a-project__links" id="myImagesBtn" onclick="imageFunction()" >afbeeldingen</button>
            <button class="a-project__links" id="myReactionsBtn" onclick="messageFunction()" >Reactie's</button>
            <button class="a-project__links" id="myDonationsBtn" onclick="donationFunction()" >Donaties</button>
        </div>

        @if(Auth::check() && $project->kijker == false)
            @if($project->user_id == Auth::user()->id || Auth::user()->soortgebruiker == 'admin')
                <form action="{{ route('kijker', $project->id) }}">
                    <p>betaal 1000 credits en zet jouw project in de kijker!</p>
                    @if(Auth::user()->credits >= 1000)
                    <button class="a-button__login a-button__kijker" type="submit">zet in de kijker</button>
                    @endif
                </form>
            @endif
        @endif

        @if(Auth::check())
            @if($project->user_id == Auth::user()->id || Auth::user()->soortgebruiker == 'admin')
                <div id="myImagesPost">
                    <form action="{{ route('imageUpload', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="project_id" value="{{$project->id}}" hidden>
                        <div id="add" class="m-image__select">
                            <span class="a-image__select a-tablet">Voeg afbeelding toe</span>
                            <span class="a-image__select a-mobile">+</span>
                            <input onclick="myFunction()" class="a-button__login a-button__kijker" type="file" name="file[]" id="file" multiple>
                        </div>
                        <button id="bevestig" class="a-button__login a-button__kijker a-display__none" type="submit" class="form-control btn btn-primary">
                            Afbeelding posten
                        </button>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>

@endsection

<script>


    function imageFunction() {
        let a = document.getElementById('myImages');
        let b = document.getElementById('myImagesBtn');
        let c = document.getElementById('myReactions');
        let d = document.getElementById('myReactionsBtn');
        let e = document.getElementById('myDonations');
        let f = document.getElementById('myDonationsBtn');
        let g = document.getElementById('myImagesPost');
        if (a.style.display === "none") {
            a.style.display = "flex";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "inline";
            e.style.display = "none";
            f.style.display = "inline";
            g.style.display = "block";

        } else {
            a.style.display = "flex";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "inline";
            e.style.display = "none";
            f.style.display = "inline";
            g.style.display = "block";
        }
    }

    function messageFunction() {
        let a = document.getElementById('myImages');
        let b = document.getElementById('myImagesBtn');
        let c = document.getElementById('myReactions');
        let d = document.getElementById('myReactionsBtn');
        let e = document.getElementById('myDonations');
        let f = document.getElementById('myDonationsBtn');
        let g = document.getElementById('myImagesPost');
        if (c.style.display === "none") {
            a.style.display = "none";
            b.style.display = "inline";
            c.style.display = "block";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "inline";
            g.style.display = "none";

        } else {
            a.style.display = "none";
            b.style.display = "inline";
            c.style.display = "block";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "inline";
            g.style.display = "none";
        }
    }

    function donationFunction() {
        let a = document.getElementById('myImages');
        let b = document.getElementById('myImagesBtn');
        let c = document.getElementById('myReactions');
        let d = document.getElementById('myReactionsBtn');
        let e = document.getElementById('myDonations');
        let f = document.getElementById('myDonationsBtn');
        let g = document.getElementById('myImagesPost');
        if (e.style.display === "none") {
            a.style.display = "none";
            b.style.display = "inline";
            c.style.display = "none";
            d.style.display = "inline";
            e.style.display = "block";
            f.style.display = "none";
            g.style.display = "none";

        } else {
            a.style.display = "none";
            b.style.display = "inline";
            c.style.display = "none";
            d.style.display = "inline";
            e.style.display = "block";
            f.style.display = "none";
            g.style.display = "none";
        }
    }

    function ophaalFunction() {
        let a = document.getElementById('ophalen');
        if (a.style.display === "block") {
            a.style.display = "none";
        } else {
            a.style.display = "none";
        }
    }

    function postFunction() {
        let a = document.getElementById('ophalen');
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "block";
        }
    }

    function myFunction(){
        let a = document.getElementById('bevestig');
        let b = document.getElementById('add');
        a.style.display = "block";
        b.style.display = "none";
        
    }


</script>