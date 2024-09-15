@extends('admin.dash')

@section('admin')
<div class="page-content">
    <div class="row d-flex">
        <!-- Contacts List -->
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Contacts Header -->
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                        <h5>Contacts</h5>
                    </div>

                    <!-- Contacts List -->
                    <div class="aside-body">
                        <ul class="list-unstyled chat-list px-1" id="contactsList">
                            @foreach($users as $user)
                                <li class="chat-item pe-1">
                                    <a href="{{ route('conversation.show', $user->id) }}" class="d-flex align-items-center">
                                        <figure class="mb-0 me-2">
                                            <div class="status {{ $user->status }}"></div>
                                            <img class="profile-img-small" src="{{ !empty($user->photo) ? url('uplode/admin_images/' . $user->photo) : url('uplode/no_image.jpg') }}" alt="profile">
                                        </figure>
                                        <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                            <div>
                                                <p class="text-body">{{ $user->firstname }}</p>
                                                <p class="text-muted tx-13">{{ $user->position }}</p>
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
    </div>
</div>
@endsection
