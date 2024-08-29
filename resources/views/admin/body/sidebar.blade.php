<div class="main-wrapper">

  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        parck<span>auto</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Principal</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item nav-category">Ajout</li>
        <li class="nav-item">
          <a href="{{route('add.car')}}" class="nav-link">
            <i class="link-icon" data-feather="plus"></i>
            <span class="link-title">Ajouter une voiture</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('add.driver') }}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">Ajouter un conducteur</span>
          </a>
        </li>

        <li class="nav-item">
        

        <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
          <i class="link-icon" data-feather="layout"></i>
          <span class="link-title">Missions</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('add.mission')}}" class="nav-link">Mission du jour</a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data-table.html" class="nav-link">Transport</a>
            </li>

            <li class="nav-item">
              <a href="pages/tables/data-table.html" class="nav-link">Événement</a>
            </li>
          </ul>
        </div>
      </li>

        <li class="nav-item nav-category">Applications Web</li>
        <li class="nav-item">
          <a href="{{route('admin.ourcars')}}" class="nav-link">
            <i class="link-icon" data-feather="activity"></i>
            <span class="link-title">Nos voitures</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Nos conducteurs</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="check-square"></i>
            <span class="link-title">Missions du jour</span>
          </a>
        </li>
        <li class="nav-item nav-category">Gestion</li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Maintenance</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/ui-components/accordion.html" class="nav-link">Accordéon</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Alertes</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">Archives</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
              </li>
              <li class="nav-item">
                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Carrousel Owl</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category">Documentation</li>
        <li class="nav-item">
          <a href="{{ route('admin.faq') }}" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">FAQ</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Conditions d'utilisation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
