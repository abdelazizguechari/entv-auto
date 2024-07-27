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
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">adding </li>
          <li class="nav-item">
            <a href="{{route('add.car')}}" class="nav-link">


              <i class="link-icon" data-feather="truck"></i>

              
              <span class="link-title">Add Car</span>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('add.driver') }}" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Add Draiver</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('add.mission') }}" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Add Mission</span>
            </a>
          </li>

          <li class="nav-item nav-category">web apps</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">our cars</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">our drivers</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="check-square"></i>
              <span class="link-title">missions of the DAY</span>
            </a>
          </li>
          <li class="nav-item nav-category">Components</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">UI Kit</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Advanced UI</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                </li>
                <li class="nav-item">
                  <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                </li>
            
              </ul>
            </div>
          </li>
        
         
        
         


        
         

          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">FAQ</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>