<style>

  .a-title__pdf{
    color: #3A1B42;
    font-family: 'Exo 2', sans-serif;
  }
  .a-image__pdf{
    width: 200px;
    margin-top: 20px;
  }
  .m-donatebar__pdf{
    width: 80%;
    background-color: #f1dccb;
    height: 30px;
  }
  </style>
<h1 class="a-title__pdf">{{ $data['titel'] }}</h1>
<img class="a-image__pdf" src="{{ $data['imagepath'].'/'. $data['imagename']}}">
<p>Categorie {{ $data['categorie']}}</p>
<p>Uitleg:<br> {{ $data['uitleg']}}</p>
<p>gedoneert: {{ $data['gedoneerd']}}</p>
<p>doelbedrag: {{ $data['doelbedrag']}}</p>

<div class='m-donatebar__pdf' >
    <div style=" width: {{$data['gedoneerd'] / $data['doelbedrag'] *100}}%; background-color: #3A1B42; height: 30px;">
    </div>
</div>
{{-- <p>{{$data['reacties']}}</p> --}}
<h2 class="a-title__pdf">Reacties</h2>
@foreach($data['reacties'] as $reactie )
  <p>{{ $reactie->reactie }}</p>
@endforeach

<h2 class="a-title__pdf">Donaties</h2>
@foreach( $data['donaties'] as $donation )
  <p>{{ $donation->user_name }} doneerde {{$donation->bedrag}}</p>
@endforeach