@extends('admin.dash')

@section('admin')

<div class="page-content">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex">



                    <div class="col-lg-4 chat-content">

                        <ul class="nav nav-tabs nav-fill mt-3" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="chats-tab" data-bs-toggle="tab" data-bs-target="#chats" role="tab" aria-controls="chats" aria-selected="true">
                                <div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-center">
                                  <i data-feather="message-square" class="icon-sm me-sm-2 me-lg-0 me-xl-2 mb-md-1 mb-xl-0"></i>
                                  <p class="d-none d-sm-block">Chats</p>
                                </div>
                              </a>
                            </li>
                        </ul>

                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                          <div>
                            <p class="text-muted mb-1">Recent chats</p>
                            <ul class="list-unstyled chat-list px-1">
                              <li class="chat-item pe-1">
                                <a href="javascript:;" class="d-flex align-items-center">
                                  <figure class="mb-0 me-2">
                                    <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                    <div class="status online"></div>
                                  </figure>
                                  <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                    <div>
                                      <p class="text-body fw-bolder">John Doe</p>
                                      <p class="text-muted tx-13">Hi, How are you?</p>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                      <p class="text-muted tx-13 mb-1">4:32 PM</p>
                                      <div class="badge rounded-pill bg-primary ms-auto">5</div>
                                    </div>
                                  </div>
                                </a>
                              </li>
                           

                             
                            
                            
                          
                              <li class="chat-item pe-1">
                                <a href="javascript:;" class="d-flex align-items-center">
                                  <figure class="mb-0 me-2">
                                    <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                    <div class="status online"></div>
                                  </figure>
                                  <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                    <div>
                                      <p class="text-body">Leonardo Payne</p>
                                      <div class="d-flex align-items-center">
                                        <i data-feather="video" class="text-muted icon-md mb-2px"></i>
                                        <p class="text-muted ms-1">Video</p>
                                      </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                      <p class="text-muted tx-13 mb-1">2 days ago</p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li class="chat-item pe-1">
                                <a href="javascript:;" class="d-flex align-items-center">
                                  <figure class="mb-0 me-2">
                                    <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                    <div class="status online"></div>
                                  </figure>
                                  <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                    <div>
                                      <p class="text-body">John Doe</p>
                                      <p class="text-muted tx-13">Hi, How are you?</p>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                      <p class="text-muted tx-13 mb-1">4 week ago</p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="calls" role="tabpanel" aria-labelledby="calls-tab">
                          <p class="text-muted mb-1">Recent calls</p>
                          <ul class="list-unstyled chat-list px-1">
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status online"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Jensen Combs</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-up-right" class="icon-sm text-success me-1"></i>
                                      <p class="text-muted tx-13">Today, 03:11 AM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="phone-call" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Leonardo Payne</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-down-left" class="icon-sm text-success me-1"></i>
                                      <p class="text-muted tx-13">Today, 11:41 AM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="video" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Carl Henson</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-down-left" class="icon-sm text-danger me-1"></i>
                                      <p class="text-muted tx-13">Today, 04:24 PM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="phone-call" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status online"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Jensen Combs</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-down-left" class="icon-sm text-danger me-1"></i>
                                      <p class="text-muted tx-13">Today, 12:53 AM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="video" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status online"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">John Doe</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-down-left" class="icon-sm text-success me-1"></i>
                                      <p class="text-muted tx-13">Today, 01:42 AM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="video" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">John Doe</p>
                                    <div class="d-flex align-items-center">
                                      <i data-feather="arrow-up-right" class="icon-sm text-success me-1"></i>
                                      <p class="text-muted tx-13">Today, 12:01 AM</p>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column align-items-end">
                                    <i data-feather="phone-call" class="text-primary icon-md"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                          <p class="text-muted mb-1">Contacts</p>
                          <ul class="list-unstyled chat-list px-1">
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Amiah Burton</p>
                                    <div class="d-flex align-items-center">
                                      <p class="text-muted tx-13">Front-end Developer</p>
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-end text-body">
                                    <i data-feather="message-square" class="icon-md text-primary me-2"></i>
                                    <i data-feather="phone-call" class="icon-md text-primary me-2"></i>
                                    <i data-feather="video" class="icon-md text-primary"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status online"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">John Doe</p>
                                    <div class="d-flex align-items-center">
                                      <p class="text-muted tx-13">Back-end Developer</p>
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-end text-body">
                                    <i data-feather="message-square" class="icon-md text-primary me-2"></i>
                                    <i data-feather="phone-call" class="icon-md text-primary me-2"></i>
                                    <i data-feather="video" class="icon-md text-primary"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">Yaretzi Mayo</p>
                                    <div class="d-flex align-items-center">
                                      <p class="text-muted tx-13">Fullstack Developer</p>
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-end text-body">
                                    <i data-feather="message-square" class="icon-md text-primary me-2"></i>
                                    <i data-feather="phone-call" class="icon-md text-primary me-2"></i>
                                    <i data-feather="video" class="icon-md text-primary"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <figure class="mb-0 me-2">
                                  <img src="https://via.placeholder.com/37x37" class="img-xs rounded-circle" alt="user">
                                  <div class="status offline"></div>
                                </figure>
                                <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body">John Doe</p>
                                    <div class="d-flex align-items-center">
                                      <p class="text-muted tx-13">Front-end Developer</p>
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-end text-body">
                                    <i data-feather="message-square" class="icon-md text-primary me-2"></i>
                                    <i data-feather="phone-call" class="icon-md text-primary me-2"></i>
                                    <i data-feather="video" class="icon-md text-primary"></i>
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>

                    </div>

<div class="col-lg-8 chat-content">
    <div class="chat-header border-bottom pb-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <i data-feather="corner-up-left" id="backToChatList" class="icon-lg me-2 ms-n2 text-muted d-lg-none"></i>
                <figure class="mb-0 me-2">
                    <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle" alt="image">
                    <div class="status online"></div>
                    <div class="status online"></div>
                </figure>
                <div>
                    <p>Guechari abdelaziz</p>
                    <p class="text-muted tx-13">super admin</p>
                </div>
            </div>
            <div class="d-flex align-items-center me-n1">
                <a class="me-3" type="button" data-bs-toggle="tooltip" data-bs-title="Start video call">
                    <i data-feather="video" class="icon-lg text-muted"></i>
                </a>
                <a class="me-0 me-sm-3" data-bs-toggle="tooltip" data-bs-title="Start voice call" type="button">
                    <i data-feather="phone-call" class="icon-lg text-muted"></i>
                </a>
                <a type="button" class="d-none d-sm-block" data-bs-toggle="tooltip" data-bs-title="Add to contacts">
                    <i data-feather="user-plus" class="icon-lg text-muted"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="chat-body">
        <ul class="messages">
            <!-- Messages will be appended here -->
        </ul>
    </div>

    <div class="chat-footer d-flex">
        <div>
            <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Emoji">
                <i data-feather="smile" class="text-muted"></i>
            </button>
        </div>
        <div class="d-none d-md-block">
            <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Attach files">
                <i data-feather="paperclip" class="text-muted"></i>
            </button>
        </div>
        <div class="d-none d-md-block">
            <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Record your voice">
                <i data-feather="mic" class="text-muted"></i>
            </button>
        </div>

        <form class="search-form flex-grow-1 me-2">
            <div class="input-group">
                <input type="text" class="form-control rounded-pill" id="message" placeholder="Type a message">
            </div>
        </form>
        <button type="submit" class="btn btn-primary btn-icon rounded-circle">
            <i data-feather="send"></i>
        </button>
    </div>
</div>

                    </div>
            </div>
        </div>

</div>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Initialize Pusher
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu'
    });
    const channel = pusher.subscribe('public');

    // Receive messages from Pusher
    channel.bind('chat', function (data) {
        $.post("/receive", {
            _token: '{{ csrf_token() }}',
            message: data.message,
        })
        .done(function (res) {
            // Assuming 'res' contains HTML for the received message
            $(".messages").append(res); // Append the received message
            $(document).scrollTop($(document).height()); // Scroll to the bottom
        })
        .fail(function () {
            console.error("Failed to receive message");
        });
    });

    // Broadcast messages
    $("form").submit(function (event) {
        event.preventDefault();

        const message = $("#message").val().trim(); // Get message from input field

        if (message !== "") {
            $.ajax({
                url: "/broadcast",
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    _token: '{{ csrf_token() }}',
                    message: message,
                },
                dataType: 'json',
                success: function (res) {
                    // Assuming 'res.message' is the message content
                    $(".messages").append(`<div style='' class="right message"><p>${res.message}</p></div>`);
                    $("#message").val(''); // Clear input field
                    $(document).scrollTop($(document).height()); // Scroll to the bottom
                },
                error: function () {
                    console.error("Failed to broadcast message");
                }
            });
        }
    });
</script>

@endsection
