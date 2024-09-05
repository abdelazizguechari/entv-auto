<style>

.nav-item .nav-category {margin-bottom: 10px};

</style>



<div class="main-wrapper">

  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        DMT<span style="color:green;">ENTV</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li style="" class="nav-item nav-category  mb-2">Principal</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item nav-category mt-2 mb-2">Ajout</li>
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
          <a class="nav-link" data-bs-toggle="collapse" href="#mission" role="button" aria-expanded="false" aria-controls="mission">
            <i class="link-icon" data-feather="layout"></i>
            <span class="link-title">Missions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="mission">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('missions.create.transportation') }}" class="nav-link">transportation</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.mission') }}" class="nav-link">mission</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.events') }}" class="nav-link">événement</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">Applications Web</li>
        <li class="nav-item">
          <a href="{{route('admin.ourcars')}}" class="nav-link">
            <i class="link-icon" data-feather="activity"></i>
            <span class="link-title">Nos voitures</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('our.drivers')}}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Nos conducteurs</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#missionsDisplay" role="button" aria-expanded="false" aria-controls="missionsDisplay">
            <i class="link-icon" data-feather="check-square"></i>
            <span class="link-title">Missions & Evenement</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="missionsDisplay">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('missions.index') }}" class="nav-link">Missions </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.index.transportation') }}" class="nav-link">Transportation</a>
              </li>

              <li class="nav-item">
                <a href="{{route('events.index')}}" class="nav-link">Evenement</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">Gestion</li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Maintenance</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('Datain.maintenance')}}" class="nav-link">Voiture en Maitenance</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Gestion Mantenance intern</a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#stock-pages" role="button" aria-expanded="false" aria-controls="stock-pages">
            <i class="link-icon" data-feather="folder"></i>
            <span class="link-title">stock</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="stock-pages">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('add.stock')}}" class="nav-link">add element to stock</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.stock')}}" class="nav-link">nos stock</a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('add.roles.permission')}}" class="nav-link">Rôle dans Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.roles.permission')}}" class="nav-link">Tous les rôles dans Permission</a>
              </li> --}}
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
                <a href="pages/advanced-ui/cropper.html" class="nav-link">mission archive</a>
              </li>
              <li class="nav-item">
                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">maintenance archive</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">Rôles & Permissions</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Rôle & Permission</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="general-pages">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">Toutes les permissions</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.role')}}" class="nav-link">Tous les rôles</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.roles.permission')}}" class="nav-link">Rôle dans Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.roles.permission')}}" class="nav-link">Tous les rôles dans Permission</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">Documentation</li>
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
