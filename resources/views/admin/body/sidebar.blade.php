
@php

use Illuminate\Support\Facades\Auth;

    
@endphp


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


        {{-- @if (Auth::user()->can('voiture.ajouter')) --}}
            
       

        <li class="nav-item">
          <a href="{{route('add.car')}}" class="nav-link">
            <i class="link-icon" data-feather="plus"></i>
            <span class="link-title">nouvelle voiture</span>
          </a>
        </li>

        {{-- @endif --}}

        {{-- @if (Auth::user()->can('add.voiture')) --}}
        
        <li class="nav-item">
          <a href="{{ route('add') }}" class="nav-link">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">nouveau conducteur</span>
          </a>
        </li>

        {{-- @endif --}}

      
        {{-- @if (Auth::user()->can('voiture.ajouter')) --}}

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#event" role="button" aria-expanded="false" aria-controls="event">
            <i class="link-icon" data-feather="layout"></i>
            <span class="link-title">Gestion des missions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          
          <div class="collapse" id="event">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('missions.create.transportation') }}" class="nav-link">Transportation</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.mission') }}" class="nav-link">Mission</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('missions.create.events') }}" class="nav-link">Organiser un événement</a>
              </li>
            </ul>
          </div>
        </li>
        
{{-- 
        @endif --}}


        <li class="nav-item nav-category mt-2 mb-2">Applications Web</li>


        @if (Auth::user()->can('vouture.menu'))


        <li class="nav-item">
          <a href="{{route('admin.ourcars')}}" class="nav-link">
            <i class="link-icon" data-feather="activity"></i>
            <p class="link-title">les voitures disponibles</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('our.drivers')}}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">les conducteurs enregistrés</span>
          </a>
        </li>

        @endif  


        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#missions" role="button" aria-expanded="false" aria-controls="missions">
            <i class="link-icon" data-feather="check-square"></i>
            <span class="link-title">Missions & Evenement</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="missions">
            <ul class="nav sub-menu">

              <li class="nav-item">
                <a href="{{ route('missions.index.transportation') }}" class="nav-link">Transportation</a>
              </li>


              <li class="nav-item">
                <a href="{{ route('missions.index') }}" class="nav-link">Missions</a>
              </li>
     
              <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link">Événement</a>
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
                <a href="{{route('Datain.maintenance')}}" class="nav-link">actuellement en maintenance</a>
              </li>
              <li class="nav-item">
                <a href="{{route('man.intern')}}" class="nav-link">Gérer la maintenance interne</a>
              </li>

              <li class="nav-item">
                <a href="{{route('nos.intern')}}" class="nav-link">nos Mantenance intern</a>
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
                <a href="{{route('driver.conger')}}" class="nav-link">Conducteurs en congé</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Conducteurs questionnaires</a>
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
                <a href="{{route('add.stock')}}" class="nav-link">Ajouter un élément au stock</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.stock')}}" class="nav-link">Voir les stocks actuels</a>
              </li>
          
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">Gérer les archives</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">

              <li class="nav-item">
                <a href="pages/advanced-ui/cropper.html" class="nav-link">Archives des missions</a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('maintenance.archive')}}" class="nav-link">maintenance archive</a>
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

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
            <i class="link-icon" data-feather="user-check"></i>
            <span class="link-title">admin & users</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="admin">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('add.admin')}}" class="nav-link">ADD admin</a>
              </li>
              <li class="nav-item">
                <a href="{{route('Our.admins')}}" class="nav-link">OUR admins</a>
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
