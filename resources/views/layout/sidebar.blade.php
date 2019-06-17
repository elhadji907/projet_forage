<ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Admin</h6>
        <a class="dropdown-item" href="{{route('villages.index')}}"><p>Villages</p></a>
        <a class="dropdown-item" href="{{route('clients.index')}}"><p>Clients</p></a>
        <a class="dropdown-item" href="#"><p>Administrateurs</p></a>
        <a class="dropdown-item" href="#"><p>Comptables</p></a>
        <a class="dropdown-item" href="#"><p>Agents</p></a>
        <a class="dropdown-item" href="#"><p>Gestionnaires</p></a>
        <a class="dropdown-item" href="#"><p>Abonnements</p></a>
        <a class="dropdown-item" href="#"><p>Compteurs</p></a>
        <a class="dropdown-item" href="#"><p>Facturation</p></a>

      {{--         
        <a class="dropdown-item" href="login.html">Login</a>
        <a class="dropdown-item" href="register.html">Register</a>
        <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a>
      --}}

      </div>
    </li>
     
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/login1') }}">
        <i class="fas fa-sign-in-alt"></i>
        <span>Connexion</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-sign-out-alt"></i>
        <span>Déconnexion</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/table') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
    
    {{--  
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
    --}}
  </ul>