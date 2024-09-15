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
                <img class="profile-img-small" src="{{ !empty($enligne->photo) ? url('uplode/admin_images/' . $enligne->photo) : url('uplode/no_image.jpg') }}" alt="profile">
                <div class="status online"></div>
              </figure>
              <div>
                <h6>{{ $enligne->firstname }} {{ $enligne->lastname }}</h6>
                <p class="text-muted tx-13">
                  @foreach($roles as $role)
                    {{ $role }}@if(!$loop->last), @endif
                  @endforeach
                </p>
              </div>
            </div>
            <div class="dropdown">
              <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="settings"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm me-2"></i> View Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm me-2"></i> Edit Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="log-out" class="icon-sm me-2"></i> Sign Out</a>
              </div>
            </div>
          </div>

          <!-- Contacts List -->
          <div class="aside-body">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#contacts">Contacts</a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#chats">Chats</a></li>
            </ul>

            <div class="tab-content">
              <!-- Contacts Tab -->
              <div id="contacts" class="tab-pane active">
                <ul class="list-unstyled">
                  @foreach($contacts as $contact)
                  <li class="contact-item">
                    <a href="#" class="d-flex align-items-center start-chat" data-id="{{ $contact->id }}">
                      <figure class="me-2 mb-0">
                        <img class="profile-img-small" src="{{ !empty($contact->photo) ? url('uplode/admin_images/' . $contact->photo) : url('uplode/no_image.jpg') }}" alt="profile">
                      </figure>
                      <div>
                        <p class="text-body">{{ $contact->firstname }} {{ $contact->lastname }}</p>
                      </div>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>

              <!-- Chats Tab -->
              <div id="chats" class="tab-pane">
                <ul class="list-unstyled chat-list">
                  <!-- Dynamically populated -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Content -->
    <div class="col-md-8 col-lg-8 chat-content" style="display: none;">
      <div class="card">
        <div class="card-body">
          <!-- Chat Header -->
          <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
            <div class="d-flex align-items-center">
              <figure class="me-2 mb-0">
                <img class="profile-img-small" id="recipientPhoto" src="" alt="profile">
                <div class="status online"></div>
              </figure>
              <div>
                <h6 id="conversationTitle"></h6>
                <div id="participantDetails"></div>
              </div>
            </div>
          </div>

          <!-- Messages -->
          <ul class="list-unstyled messages">
            <!-- Dynamically populated -->
          </ul>

          <!-- Message Input -->
          <form id="chatForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
              <input type="text" class="form-control" id="message" name="message" placeholder="Type your message here...">
              <input type="file" id="file" name="file" style="display: none;">
              <button class="btn btn-primary" type="submit">Send</button>
              <button type="button" id="attachFilesButton" class="btn btn-secondary">Attach</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>

$(document).ready(function() {
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

  function updateConversationDetails(conversationId) {
      console.log(`Fetching conversation details for ID: ${conversationId}`);

      $.get(`/conversations/${conversationId}/details`)
          .done(function(data) {
              console.log('Conversation details:', data);

              if (data && data.conversation) {
                  $('#conversationTitle').text(data.conversation.title);
                  $('#recipientPhoto').attr('src', data.conversation.photo || url('uplode/no_image.jpg'));
                  
                  // Assuming participants is an array of user objects
                  let participantsDetails = data.conversation.participants.map(participant => 
                      `<p class="text-muted tx-13">${participant.name} (${participant.email})</p>`
                  ).join('');
                  
                  $('#participantDetails').html(participantsDetails);
              } else {
                  console.error('Invalid conversation details:', data);
              }
          })
          .fail(function(xhr, status, error) {
              console.error('Failed to fetch conversation details:', {
                  status: status,
                  error: error,
                  responseText: xhr.responseText
              });
              alert('Error fetching conversation details.');
          });
  }

  $(document).on('click', '.conversation', function(e) {
      e.preventDefault();
      selectedConversationId = $(this).data('id');
      localStorage.setItem('selectedConversationId', selectedConversationId);

      scrollPosition = $('.messages').scrollTop();
      loadMessages(selectedConversationId);
      updateConversationDetails(selectedConversationId);
  });

  $(document).on('click', '.start-chat', function(e) {
      e.preventDefault();
      let userId = $(this).data('id');

      $.post('/conversations', { user_id: userId, _token: $('meta[name="csrf-token"]').attr('content') })
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
              updateConversationDetails(selectedConversationId);
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
              data: { _token: $('meta[name="csrf-token"]').attr('content'), message: $('#message').val() },
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
  