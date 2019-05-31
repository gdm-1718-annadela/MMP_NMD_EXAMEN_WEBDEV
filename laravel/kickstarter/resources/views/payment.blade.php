@extends('layout')
@section('pagecontent')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Credits kopen!</h3>
                        <div class="display-td" >
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('stripe.post') }}" method="post" id="payment-form">
                        <div class="form-group">
                            <label class="control-label" for="inpCredits">Hoeveel credits wil je kopen?</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-gem"></i></span>
                                <input type="number" class="form-control" name="credits" id="inpCredits">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="inpCost">Kostprijs</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-euro-sign"></i></span>
                                <input type="text" class="form-control" name="cost" disabled id="inpCost">
                            </div>
                        </div>

                        @csrf
                        <div class="form-group">
                            <label for="card-element">
                                Credit/Debit Kaartnummer
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button class="btn btn-primary">
                            Kopen die handel
                        </button>

                        <div>
                            <p>Je hebt {{ $user }} credits!</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection