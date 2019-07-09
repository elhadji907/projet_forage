@include('flash::message')
{{-- <!-- Icon Cards--> --}}
@roles('Administrateur|Gestionnaire|Comptable|Agent')
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
       {{--  <div class="mr-5">26 New Messages!</div> --}}
       <div class="mr-5">{{ \App\Client::get()->count() }} Clients</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('clients.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-list"></i>
        </div>
        <div class="mr-5">{{ \App\Abonnement::get()->count() }} Abonnements</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('abonnements.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <div class="mr-5">{{ \App\Compteur::doesntHave('abonnement')->get()->count() }} Compteurs disponibles<br />
        </div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('compteurs.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-life-ring"></i>
        </div>
        <div class="mr-5">{{ \App\Facture::doesntHave('reglement')->get()->count() }} Factures non réglées</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('factures.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</di    
      {{-- <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-area"></i>
          Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div> --}}

    {{--   @include('clients.index') --}}

@endroles