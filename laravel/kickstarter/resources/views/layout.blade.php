<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="stripe-token" content="{{ env('STRIPE_KEY') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Exo+2:100,200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/stripe-demo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const creditRatio = {{ env('CREDIT_RATIO')}};
  </script>
  <title>SmartUp!</title>
</head>
<body @if (Request::path() == '/') class="o-body__home" @else class='o-body__page' @endif>
  @yield('homecontent')
  @include('partials.header')
  @yield('pagecontent')
  @if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
    @endif
    @if (session('succes'))
    <div class="alert alert-success">
        {{ session('succes') }}
    </div>
    @endif
  <script>
    let convertUrl = '{{ route('api.convert') }}';
</script>
<script src="{{ asset('js/stripe-demo.js') }}"></script>
</body>
</html>