@php
  use Illuminate\Support\Facades\Auth;

  $id = Auth::user()->id;
  $profiledata = App\Models\User::find($id);
  $notifications = Auth::user()->notifications()->latest()->take(5)->get(); // Fetch notifications
  $notificationCount = $notifications->count();
@endphp

<nav class="navbar">

				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>

        {{-- <div style="display: flex; align-items: center;margin-left: 3px;">
          
          <div id="currentDate" style="width: 210px; margin-left: 3px;" class="text-light fs-6"></div>
      </div>
       --}}

				<div class="navbar-content">
         
        
					<ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mt-1" title="{{ session('locale') === 'ar' ? 'ar' : 'fr' }}"></i>
                <span class="ms-1 me-1 d-none d-md-inline-block">{{ session('locale') === 'ar' ? 'Ar' : 'Fr' }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                <!-- French Option -->
                <form action="{{ route('locale.switch') }}" method="POST" class="dropdown-item py-2">
                    @csrf
                    <input type="hidden" name="locale" value="fr">
                    <button type="submit" class="btn btn-link p-0">
                        <i class="mt-1" title="fr"></i>
                        <span class="ms-1">Fr</span>
                    </button>
                </form>
                
                <!-- Arabic Option -->
                <form action="{{ route('locale.switch') }}" method="POST" class="dropdown-item py-2">
                    @csrf
                    <input type="hidden" name="locale" value="ar">
                    <button type="submit" class="btn btn-link p-0">
                        <i class="mt-1" title="ar"></i>
                        <span class="ms-1">Ar</span>
                    </button>
                </form>
            </div>
        </li>
          

          <button style="border: none" id="theme-switcher" class="btn btn-outline-secondary">
            <i id="theme-icon" data-feather="moon"></i>
        </button>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p class="mb-0 fw-bold">Application Web</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
                <div class="row g-0 p-1">
                  <div class="col-3 text-center">
                    <a href="{{route('chatee.app')}}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="{{route('caladner.add')}}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendrier</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                  </div>
                </div>
							</div>
						</li>
            

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    @if (Auth::user()->unreadNotifications->count())
                        <div class="indicator">
                            <div class="circle"></div>
                        </div>
                    @endif
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>{{ Auth::user()->unreadNotifications->count() }} Notifications</p>
                    </div>
                    <div class="p-1">
                        @forelse (Auth::user()->unreadNotifications as $notification)
                            <a href="{{ route('notifications.show', $notification->id) }}" class="dropdown-item py-2 {{ !$notification->read_at ? 'bg-light' : '' }}">
                                <i class="me-2 icon-md" data-feather="info"></i> 
                                <span class="{{ !$notification->read_at ? 'font-weight-bold' : 'text-muted' }}">
                                    {{ $notification->data['message'] }}
                                </span>
                            </a>
                        @empty
                            <p class="dropdown-item"></p>
                        @endforelse
                    </div>
                </div>
            </li>


						<li class="nav-item dropdown">
              
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="profile-img-small" src="{{ !empty($profiledata->photo) 
                    ? url('uplode/admin_images/' . $profiledata->photo) 
                    : url('uplode/no_image.jpg') 
                }}" alt="profile">
            </a>

							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                  <div class="mb-3">
                    <img class="profile-img-smalll" src="{{ !empty($profiledata->photo) 
                        ? url('uplode/admin_images/' . $profiledata->photo) 
                        : url('uplode/no_image.jpg') 
                    }}" alt="">
                </div>
                
									<div class="text-center">
										<p class="tx-16 fw-bolder">{{$profiledata -> firstname}}</p>
										<p class="tx-12 text-muted">{{$profiledata -> email}}</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="{{route('admin.profile')}}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="{{route('change.password')}}" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Changer le mot de passe</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Changer Utilisateur</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    
                    <form method="POST" action="{{ route('admin.logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item py-2 text-body ms-0">
                          <i class="me-2 icon-md" data-feather="log-out"></i>
                          <span>Log Out</span>
                      </button>
                  </form>
                  

                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>

    


  