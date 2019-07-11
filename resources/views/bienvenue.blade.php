@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

{{-- <div class="jumbotron jumbotron-fluid change">
  <div class="container" style="background-image: url('{{ asset('images/image_onfp.jpg')}}')">
    <h1 class="display-4">Sen Forage!</h1>
    <p class="lead">{{ ("Votre socièté de distribution d'eau potable.") }}</p>
    <hr class="my-4">
    <p>{{ ("L'eau est un liquide précieux.") }}.</p>
  </div> 
</div> --}}

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>{{ ("Sen Forage") }}</h1>
      <p class="lead">{{ ("Votre socièté de distribution d'eau potable") }}</p>
    </div>
  </header>
 
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
