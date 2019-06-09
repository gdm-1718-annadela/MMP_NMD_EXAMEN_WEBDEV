@extends('layout')
@section('pagecontent')
<div class="o-login">
    <div class="m-left-image"></div>
    <div class="m-form__login" >
            <h1 class="a-title-login">Credits kopen</h1>
            <div class="display-td" >
                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
            </div>

        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <form class="m-form__login" action="{{ route('stripe.post') }}" method="post" id="payment-form">
            <input type="number" class="a-input__login"  name="credits" id="inpCredits" placeholder= "Geef aantal credits in">
            <input class="a-input__login" type="text" class="a-input__login" name="cost" disabled id="inpCost">
            @csrf
            <div class="a-input__login">
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button class="a-button__login">
                Kopen die handel
            </button>

            <div>
                <p>Je hebt {{ $user }} credits!</p>
            </div>
        </form>
</div>
@endsection