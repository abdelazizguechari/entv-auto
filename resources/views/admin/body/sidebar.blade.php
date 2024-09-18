@php
use Illuminate\Support\Facades\Auth;
@endphp

<style>
.nav-item .nav-category { margin-bottom: 10px; }
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
        <li class="nav-item nav-category mb-2">{{ __('navbar.dashboard') }}</li>

        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">{{ __('navbar.dashboard') }}</span>
          </a>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.add_car') }}</li>

        <li class="nav-item">
          <a href="{{ route('add.car') }}" class="nav-link">
            <i class="link-icon" data-feather="plus"></i>
            <span class="link-title">{{ __('navbar.add_car') }}</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('add') }}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">{{ __('navbar.add_driver') }}</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#event" role="button" aria-expanded="false" aria-controls="event">
            <i class="link-icon" data-feather="layout"></i>
            <span class="link-title">{{ __('navbar.missions_management') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          
          <div class="collapse" id="event">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('missions.create.transportation') }}" class="nav-link">{{ __('navbar.transportation') }}</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.mission') }}" class="nav-link">{{ __('navbar.mission') }}</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.events') }}" class="nav-link">{{ __('navbar.organize_event') }}</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.available_cars') }}</li>

        <li class="nav-item">
          <a href="{{ route('admin.ourcars') }}" class="nav-link">
            <i class="link-icon" data-feather="activity"></i>
            <p class="link-title">{{ __('navbar.available_cars') }}</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('our.drivers') }}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">{{ __('navbar.registered_drivers') }}</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#missions" role="button" aria-expanded="false" aria-controls="missions">
            <i class="link-icon" data-feather="check-square"></i>
            <span class="link-title">{{ __('navbar.missions_events') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="missions">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('missions.index.transportation') }}" class="nav-link">{{ __('navbar.transportation') }}</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.index') }}" class="nav-link">{{ __('navbar.mission') }}</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link">{{ __('navbar.organize_event') }}</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category mt-2 mb-2">Section de gestion</li>

<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
    <i class="link-icon" data-feather="settings"></i>
    <span class="link-title">maintenance des voitures</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="uiComponents">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{ route('Datain.maintenance') }}" class="nav-link">actuellement en maintenance</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('man.intern') }}" class="nav-link">Gérer la maintenance interne</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('nos.intern') }}" class="nav-link">nos Mantenance intern</a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#conducteur" role="button" aria-expanded="false" aria-controls="conducteur">
    <i class="link-icon" data-feather="clipboard"></i>
    <span class="link-title">Gérer les conducteurs</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="conducteur">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{ route('driver.conger') }}" class="nav-link">Conducteurs en congé</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('Cond.qtr') }}" class="nav-link">Conducteurs questionnaires</a>
      </li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#stock-pages" role="button" aria-expanded="false" aria-controls="stock-pages">
    <i class="link-icon" data-feather="folder"></i>
    <span class="link-title">Gestion des stocks</span>
    <i class="link-arrow" data-feather="chevron-down"></i>
  </a>
  <div class="collapse" id="stock-pages">
    <ul class="nav sub-menu">
      <li class="nav-item">
        <a href="{{ route('add.stock') }}" class="nav-link">Ajouter un élément au stock</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('all.stock') }}" class="nav-link">Voir les stocks actuels</a>
      </li>
    </ul>
  </div>
</li>




        <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.manage_archives') }}</li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#archives" role="button" aria-expanded="false" aria-controls="archives">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">{{ __('navbar.manage_archives') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="archives">
            <ul class="nav sub-menu">
              
              <li class="nav-item">
                <a href="{{ route('mission.archives') }}" class="nav-link">{{ __('navbar.mission_archives') }}</a>
            </li>
            
              <li class="nav-item">
                <a href="{{ route('maintenance.archive') }}" class="nav-link">{{ __('navbar.maintenance_archive') }}</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">{{ __('navbar.driver_vacation_archive') }}</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">{{ __('navbar.driver_signal_archive') }}</a>
              </li>
            </ul>
          </div>
        </li>

          <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.roles_permissions') }}</li>
          <li class="nav-item">
            <a href="{{ route('all.permission') }}" class="nav-link">
              <i class="link-icon" data-feather="key"></i>
              <span class="link-title">{{ __('navbar.all_permissions') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('all.role') }}" class="nav-link">
              <i class="link-icon" data-feather="shield"></i>
              <span class="link-title">{{ __('navbar.all_roles') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('add.roles.permission') }}" class="nav-link">
              <i class="link-icon" data-feather="lock"></i>
              <span class="link-title">{{ __('navbar.roles_in_permission') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('all.roles.permission') }}" class="nav-link">
              <i class="link-icon" data-feather="lock"></i>
              <span class="link-title">{{ __('navbar.roles_in_permissions') }}</span>
            </a>
          </li>
          <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.admin_users') }}</li>
          <li class="nav-item">
            <a href="{{ route('add.admin') }}" class="nav-link">
              <i class="link-icon" data-feather="user-plus"></i>
              <span class="link-title">{{ __('navbar.add_admin') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Our.admins') }}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">{{ __('navbar.our_admins') }}</span>
            </a>
          </li>
          <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.logs') }}</li>
          <li class="nav-item">
            <a href="{{ route('logs.index') }}" class="nav-link">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">{{ __('navbar.logs') }}</span>
            </a>
          </li>
          <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.faq') }}</li>
          <li class="nav-item">
            <a href="{{ route('admin.faq') }}" class="nav-link">
              <i class="link-icon" data-feather="help-circle"></i>
              <span class="link-title">{{ __('navbar.faq') }}</span>
            </a>
          </li>
          <li class="nav-item nav-category mt-2 mb-2">{{ __('navbar.terms_conditions') }}</li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">{{ __('navbar.terms_conditions') }}</span>
            </a>
          </li>
    
      </ul>
    </div>
  </nav>
  <!-- partial -->

