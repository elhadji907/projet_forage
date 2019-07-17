<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url('/accueil') }}">Gestion forage</a>
    
    @roles('Administrateur|Gestionnaire|Comptable|Agent')
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    @endroles

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

   {{--  <!-- Navbar --> --}}
    <ul class="navbar-nav ml-auto ml-md-0">
    @roles('Administrateur|Gestionnaire|Comptable')
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span class="badge badge-danger">9+</span>
          <i class="fas fa-bell fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span class="badge badge-danger">7</span>
          <i class="fas fa-envelope fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something</a>
        </div>
      </li>
@endroles
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            @guest            
              <a class="dropdown-item" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __("Se connecter") }}</a>             
              @if (Route::has('register'))             
              <a class="dropdown-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>               
              @endif
              @else
              <a class="dropdown-item" href="#"> 
              {{ Auth::user()->firstname }}
               {{ Auth::user()->name }}
            </a>
            <a class="dropdown-item" href="#"><i class="fas fa-cog"></i>&nbsp;Réglages</a>
            <a class="dropdown-item" href="#"><i class="fab fa-adn"></i>&nbsp;Activités</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt"></i>&nbsp;
            Déconnexion
            </a>
            @endguest
          </div>
      </li>
    </ul>

  </nav>