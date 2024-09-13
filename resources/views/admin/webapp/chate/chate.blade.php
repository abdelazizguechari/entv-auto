@extends('admin.dash')

@section('admin')
<div class="page-content">
  <div class="row d-flex">
    <!-- Sidebar -->
    <div class="col-md-4 col-lg-4 chat-aside border-end-lg">
      <div class="card">
        <div class="card-body">
          <!-- Sidebar Header -->
          <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
            <div class="d-flex align-items-center">
              <figure class="me-2 mb-0">
                <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle" alt="profile">
                <div class="status online"></div>
              </figure>
              <div>
                <h6>Amiah Burton</h6>
                <p class="text-muted tx-13">Software Developer</p>
              </div>
            </div>
            <div class="dropdown">
              <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="settings"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm me-2"></i> View Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm me-2"></i> Edit Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="aperture" class="icon-sm me-2"></i> Add status</a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="settings" class="icon-sm me-2"></i> Settings</a>
              </div>
            </div>
          </div>

          <!-- Tabs for Chats and Contacts -->
          <ul class="nav nav-tabs nav-fill mt-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="chats-tab" data-bs-toggle="tab" data-bs-target="#chats" role="tab" aria-controls="chats" aria-selected="true">
                <div class="d-flex align-items-center justify-content-center">
                  <i data-feather="message-square" class="icon-sm me-2"></i>
                  <p class="d-none d-sm-block">Chats</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" role="tab" aria-controls="contacts" aria-selected="false">
                <div class="d-flex align-items-center justify-content-center">
                  <i data-feather="users" class="icon-sm me-2"></i>
                  <p class="d-none d-sm-block">Contacts</p>
                </div>
              </a>
            </li>
          </ul>

          <!-- Sidebar Body -->
          <div class="aside-body">
            <!-- Recent Chats -->
            <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
              <p class="text-muted mb-1">Recent chats</p>
              <ul class="list-unstyled chat-list px-1">
                @foreach($conversations as $conversation)
                  <li class="chat-item pe-1">
                    <a href="#" class="d-flex align-items-center conversation" data-id="{{ $conversation->id }}">
                      <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                        <div>
                          <p class="text-body">{{ $conversation->title ?? 'Conversation ' . $conversation->id }}</p>
                        </div>
                      </div>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- Contacts List -->
            <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
              <p class="text-muted mb-1">Contacts</p>
              <ul class="list-unstyled chat-list px-1">
                @foreach($users as $user)
                  <li class="chat-item pe-1">
                    <a href="#" class="d-flex align-items-center start-chat" data-id="{{ $user->id }}">
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
    </div>

    <!-- Chat Content -->
    <div class="col-md-8 col-lg-8 chat-content">
      <!-- Chat Header -->
      <div class="chat-header border-bottom pb-2">
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-center">
            <i data-feather="corner-up-left" id="backToChatList" class="icon-lg me-2 ms-n2 text-muted d-lg-none"></i>
            <figure class="mb-0 me-2">
              <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle" alt="image">
              <div class="status online"></div>
            </figure>
            <div>
              <p id="conversationTitle">Conversation Title</p>
              <p class="text-muted tx-13">Participant Details</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Chat Body -->
      <div class="chat-body">
        <ul class="messages">
          <!-- Messages will be dynamically loaded here -->
        </ul>
      </div>

      <!-- Chat Footer -->
      <div class="chat-footer d-flex">
        <div class="d-none d-md-block">
          <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Attach files" id="attachFilesButton">
            <i data-feather="paperclip" class="text-muted"></i>
          </button>
          <input type="file" id="file" name="file" class="d-none">
        </div>
        <form id="chatForm" class="search-form flex-grow-1 me-2">
          <div class="input-group">
            <input type="text" class="form-control rounded-pill" id="message" name="message" placeholder="Type a message" autocomplete="off">
          </div>
        </form>
        <div>
          <button type="submit" class="btn btn-primary btn-icon rounded-circle" id="sendMessageButton">
            <i data-feather="send"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>$(document).ready(function() {
  let selectedConversationId = localStorage.getItem('selectedConversationId') || null;
  let scrollPosition = 0;

  function loadMessages(conversationId) {
      $('.messages').html('');
      console.log(`Loading messages for conversation ID: ${conversationId}`);

      $.get(`/conversations/${conversationId}/messages`)
          .done(function(data) {
              console.log('Messages data:', data);
              
              if (!data || !Array.isArray(data.messages)) {
                  console.error('Invalid response:', data);
                  alert('Error: Failed to load messages.');
                  return;
              }

              if (data.messages.length === 0) {
                  $('.messages').append('<p>No messages found.</p>');
              } else {
                  data.messages.forEach(function(message) {
                      let messageClass = message.user_id === data.current_user_id ? 'sender' : 'receiver';
                      if (message.file_path) {
                          $('.messages').append(`
                              <li class="message-item ${messageClass}">
                                  <div class="message-bubble">
                                      <a href="${message.file_path}" target="_blank">View File</a>
                                      <span class="message-time">${message.time || ''}</span>
                                  </div>
                              </li>
                          `);
                      } else {
                          $('.messages').append(`
                              <li class="message-item ${messageClass}">
                                  <div class="message-bubble">
                                      <p>${message.message}</p>
                                      <span class="message-time">${message.time || ''}</span>
                                  </div>
                              </li>
                          `);
                      }
                  });
              }

              $('.messages').scrollTop(scrollPosition);
          })
          .fail(function(xhr, status, error) {
              console.error('Failed to load messages:', {
                  status: status,
                  error: error,
                  responseText: xhr.responseText
              });
              alert('Error loading messages.');
          });
  }

  $(document).on('click', '.conversation', function(e) {
      e.preventDefault();
      selectedConversationId = $(this).data('id');
      localStorage.setItem('selectedConversationId', selectedConversationId);

      scrollPosition = $('.messages').scrollTop();
      loadMessages(selectedConversationId);
  });

  $(document).on('click', '.start-chat', function(e) {
      e.preventDefault();
      let userId = $(this).data('id');

      $.post('/conversations', { user_id: userId, _token: '{{ csrf_token() }}' })
          .done(function(data) {
              console.log('Start chat response:', data);
              
              if (data.error) {
                  console.error('Error starting conversation:', data.error);
                  alert('Failed to start conversation.');
                  return;
              }

              selectedConversationId = data.conversation.id;
              localStorage.setItem('selectedConversationId', selectedConversationId);

              $('.chat-content').show();
              $('.aside-body .tab-pane#chats').append(`
                  <li class="chat-item pe-1">
                      <a href="#" class="d-flex align-items-center conversation" data-id="${selectedConversationId}">
                          <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                              <div>
                                  <p class="text-body">${data.conversation.title}</p>
                              </div>
                          </div>
                      </a>
                  </li>
              `);

              loadMessages(selectedConversationId);
          })
          .fail(function(xhr, status, error) {
              console.error('Failed to start conversation:', {
                  status: status,
                  error: error,
                  responseText: xhr.responseText
              });
              alert('Error starting conversation.');
          });
  });

  $('#chatForm').submit(function(event) {
      event.preventDefault();

      if (selectedConversationId === null) {
          alert('Please select a conversation first.');
          return;
      }

      let formData = new FormData(this);

      if ($('#file')[0].files.length > 0) {
          $.ajax({
              url: `/conversations/${selectedConversationId}/send-file`,
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success: function(res) {
                  console.log('File upload response:', res);
                  
                  if (res.error) {
                      console.error('File upload error:', res.error);
                      alert('File upload failed: ' + res.error);
                      return;
                  }

                  $('.messages').append(`
                      <li class="message-item sender">
                          <div class="message-bubble">
                              <a href="${res.file_path}" target="_blank">View File</a>
                              <span class="message-time">${res.time || ''}</span>
                          </div>
                      </li>
                  `);
                  $('#file').val('');
                  $('.messages').scrollTop($('.messages')[0].scrollHeight);
              },
              error: function(xhr, status, error) {
                  console.error('File upload failed:', {
                      status: status,
                      error: error,
                      responseText: xhr.responseText
                  });
                  alert('File upload failed: ' + error);
              }
          });
      } else {
          $.ajax({
              url: `/conversations/${selectedConversationId}/send-message`,
              type: 'POST',
              data: { _token: '{{ csrf_token() }}', message: $('#message').val() },
              success: function(res) {
                  console.log('Message send response:', res);
                  
                  if (res.error) {
                      console.error('Message sending error:', res.error);
                      alert('Message sending failed: ' + res.error);
                      return;
                  }

                  $('.messages').append(`
                      <li class="message-item sender">
                          <div class="message-bubble">
                              <p>${res.message}</p>
                              <span class="message-time">${res.time || ''}</span>
                          </div>
                      </li>
                  `);
                  $('#message').val('');
                  $('.messages').scrollTop($('.messages')[0].scrollHeight);
              },
              error: function(xhr, status, error) {
                  console.error('Message sending failed:', {
                      status: status,
                      error: error,
                      responseText: xhr.responseText
                  });
                  alert('Message sending failed: ' + error);
              }
          });
      }
  });

  $('#attachFilesButton').click(function() {
      $('#file').click();
  });
});

</script>
@endsection
