@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

{{--  <div class="jumbotron jumbotron-fluid">
  <div>
    <h1 class="display-4">{{ ("SenForage!") }}</h1>
    <p class="lead">{{ ("est une entreprise évoluant dans la production et la distribution d’eau pour les villageois du nord du Sénégal") }}</p>
    <hr class="my-4">
    <p>{{ ("L'eau est un liquide précieux.") }}.</p>
  </div> 
</div>   --}}

<div class="jumbotron" id="jumbotron">
</div>

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
