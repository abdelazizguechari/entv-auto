@php
     $currentUserId = auth()->user();
     $users = App\Models\User::all()
@endphp


<div class="col-md-12 col-lg-12 chat-aside border-end-lg">
    <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <img class="profile-img-small me-2" src="{{ !empty($currentUserId->photo) 
            ? url('uplode/admin_images/' . $currentUserId->photo) 
            : url('uplode/no_image.jpg') }}" alt="profile">
            <p class="mb-0">{{ $currentUserId->firstname }} {{ $currentUserId->lastname }}</p>
        </div>
          <hr>
          <ul class="nav nav-tabs nav-fill mt-3" role="tablist"> 
              <li class="nav-item">
                  <a class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" role="tab" aria-controls="contacts" aria-selected="false">
                      <div class="d-flex align-items-center justify-content-center">
                          <i data-feather="users" class="icon-sm me-2"></i>
                          <hr>
                          <p class="d-none d-sm-block">Contacts</p>
                      </div>
                  </a>
              </li>
          </ul>
          <!-- Contacts List -->
          <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
              <p class="text-muted mb-1">Contacts</p>
              <ul class="list-unstyled chat-list px-1">
                  @foreach($users as $user)
                      <li class="chat-item pe-1">
                          <a href="{{ route('conversation.show', $user->id) }}" class="d-flex align-items-center start-chat" data-id="{{ $user->id }}">
                              <figure class="mb-0 me-2">
                                  <div class="status {{ $user->status }}"></div>
                              </figure>
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                      <p class="text-body">{{ $user->firstname }}</p>
                                      <p class="text-muted tx-13">{{ $user->position }}</p>
                                  </div>
                                  <div class="d-flex align-items-end text-body">
                                      <i data-feather="message-square" class="icon-md text-primary me-2"></i>
                                  </div>
                              </div>
                          </a>
                      </li>
                  @endforeach
              </ul>
          </div>
        </div>
      </div>
    </div>
  