@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

<div class="jumbotron bg-grad" id="jumbotron">
  
  <p class="card-text"> {{ $date_actuel }}</p>
  
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
