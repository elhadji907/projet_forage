<ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/bienvenue') }}">
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
        <h6 class="dropdown-header">NAVIGUER ICI</h6>
        @roles('Gestionnaire|Administrateur')
        <a class="dropdown-item" href="{{ route('villages.index') }}"><p>Villages</p></a>
        <a class="dropdown-item" href="{{ route('clients.index') }}"><p>Clients</p></a>
        <a class="dropdown-item" href="{{ route('compteurs.index') }}"><p>Compteurs</p></a>
        <a class="dropdown-item" href="{{ route('administrateurs.index') }}"><p>Administrateurs</p></a>
        @endroles
        @roles('Administrateur')
        <a class="dropdown-item" href="{{ route('agents.index') }}"><p>Agents</p></a>
        <a class="dropdown-item" href="{{ route('abonnements.index') }}"><p>Abonnements</p></a>
        <a class="dropdown-item" href="{{ route('consommations.index') }}"><p>Consommation</p></a>
        <a class="dropdown-item" href="{{ route('factures.index') }}"><p>Factures</p></a>
        <a class="dropdown-item" href="{{ route('factures.index') }}"><p>Réglement</p></a>
        <a class="dropdown-item" href="#"><p>Comptables</p></a>
        @endroles

        <a class="dropdown-item" href="#"><p>Gestionnaires</p></a>

      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/table') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
  </ul>