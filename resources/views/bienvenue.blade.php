@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

<div class="jumbotron jumbotron-fluid change">
  <div>
    <h1 class="display-4">{{ ("SenForage!") }}</h1>
    <p class="lead">{{ ("est une entreprise évoluant dans la production et la distribution d’eau pour les villageois du nord du Sénégal") }}</p>
    <hr class="my-4">
    <p>{{ ("L'eau est un liquide précieux.") }}.</p>
  </div> 
</div>

  {{-- <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>{{ ("Sen Forage") }}</h1>
      <p class="lead">{{ ("est une entreprise évoluant dans la production et la distribution d’eau pour les villageois du nord du Sénégal") }}</p>
     </div>
    <hr/>
  </header> --}}
 
  @if (session('permission'))
  <div class="alert alert-success">
      {{ session('permission') }}
  </div>
  @endif
  
  @include('section')

  @include('footer')

  @include('scripts')
</body>

</html>
