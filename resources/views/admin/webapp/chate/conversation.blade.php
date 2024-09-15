@extends('admin.dash')

@section('admin')
<div class="page-content">
    <!-- Chat Content -->
    <div class="col-md-12 col-lg-12 chat-content">
        <!-- Chat Header -->
        <div class="chat-header border-bottom pb-2">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <i data-feather="corner-up-left" id="backToChatList" class="icon-lg me-2 ms-n2 text-muted d-lg-none"></i>
                    <figure class="mb-0 me-2">

                        <img class="profile-img-small me-2" src="{{ !empty($user->photo) 
                        ? url('uplode/admin_images/' . $user->photo) 
                        : url('uplode/no_image.jpg') 
                    }}" alt="profile">

                       
                    </figure>
                    <div>
                        <p id="conversationTitle"><h5></h5></p>
                        <p id="userPosition" class="text-muted tx-13"></p>
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
        <div class="chat-footer mt-7 d-flex">
            <div class="d-none d-md-block">
                <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Attach files" id="attachFilesButton">
                    <i data-feather="paperclip" class="text-muted"></i>
                </button>
                <input type="file" id="file" name="file" class="d-none">
            </div>
            <form id="chatForm" class="search-form flex-grow-1 me-2">
                @csrf
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
@endsection

<!-- Add these styles within a <style> tag in the Blade template or in your CSS file -->
<style>
    .message-item {
      display: flex;
      margin-bottom: 10px;
    }

    .message-bubble {
      max-width: 70%;
      padding: 10px;
      border-radius: 15px;
      background: #f1f0f0;
      position: relative;
      word-break: break-word;
    }

    .message-item.sender {
      justify-content: flex-end;
    }

    .message-item.sender .message-bubble {
      background: #007bff;
      color: #fff;
    }

    .message-item.receiver {
      justify-content: flex-start;
    }

    .message-item.receiver .message-bubble {
      background: #e5e5ea;
    }

    .message-time {
      display: block;
      font-size: 0.75em;
      color: #888;
    }
</style>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    $(document).ready(function() {
        // Ensure userId and conversationId are correctly passed from PHP to JavaScript
        let userId = @json($user->id);
        let conversationId = @json($conversationId);

        // Initialize Pusher
        Pusher.logToConsole = true;
        var pusher = new Pusher('6317ecf389de0f81cafb', {
            cluster: 'eu',
            encrypted: true
        });

        // Subscribe to the conversation channel
        var channel = pusher.subscribe('conversation.' + conversationId);

        // Bind to the event emitted by Laravel
        channel.bind('MessageSent', function(data) {
            console.log('New message:', data.message);
            appendMessage(data.message);
        });

        // Function to fetch user info and update UI
        function fetchUserInfo(userId) {
            $.get(`/users/${userId}`)
                .done(function(data) {
                    console.log('User data:', data);
                    let imageUrl = data.photo ? `/upload/admin_images/${data.photo}` : '/upload/no_image.jpg';
                    $('#userImage').attr('src', imageUrl);

                    $('#userStatus').removeClass('online offline').addClass(data.status);

                    $('#conversationTitle').text(`${data.firstname} ${data.lastname}`);
                    $('#userPosition').text(data.position || 'No position info');
                })
                .fail(function(xhr, status, error) {
                    console.error('Error fetching user info:', error);
                    $('#userImage').attr('src', '/upload/no_image.jpg');
                    $('#userStatus').removeClass('online offline').addClass('offline');
                    $('#conversationTitle').text('Unknown User');
                    $('#userPosition').text('No position info');
                });
        }

        // Function to load messages for a conversation
        function loadMessages(conversationId) {
            $('.messages').html(''); // Clear existing messages
            $.get(`/conversations/${conversationId}/messages`)
                .done(function(data) {
                    if (data && Array.isArray(data.messages)) {
                        data.messages.forEach(function(message) {
                            appendMessage(message);
                        });
                    } else {
                        $('.messages').append('<p>No messages found.</p>');
                    }
                    $('.messages').scrollTop($('.messages')[0].scrollHeight); // Scroll to bottom
                })
                .fail(function(xhr, status, error) {
                    console.error('Error loading messages:', error);
                    $('.messages').append('<p>Error loading messages.</p>');
                });
        }

        // Function to send a message
        function sendMessage(message) {
            if (!message.trim()) {
                console.warn('Message is empty.');
                return;
            }

            $.ajax({
                url: `/conversations/${conversationId}/send-message`,
                method: 'POST',
                data: {
                    _token: $('input[name=_token]').val(),
                    message: message
                },
                success: function(response) {
                    if (response && response.message) {
                        appendMessage(response.message);
                        $('#message').val(''); // Clear the input field
                    } else {
                        console.error('Invalid response:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending message:', error);
                }
            });
        }

        // Function to append a message to the chat
        function appendMessage(messageData) {
            if (!messageData || !messageData.message) {
                console.error('Invalid message data:', messageData);
                return;
            }

            const isOwnMessage = messageData.user_id === userId;
            const messageClass = isOwnMessage ? 'sender' : 'receiver';
            const messageHtml = messageData.file_path ? `
                <li class="message-item ${messageClass}">
                    <div class="message-bubble">
                        <a href="${messageData.file_path}" target="_blank">View File</a>
                    </div>
                </li>` : `
                <li class="message-item ${messageClass}">
                    <div class="message-bubble">
                        <p>${messageData.message}</p>
                        <span class="message-time">${messageData.time}</span>
                    </div>
                </li>`;
            
            $('.messages').append(messageHtml);
            $('.messages').scrollTop($('.messages')[0].scrollHeight); // Scroll to bottom
        }

        // Event handler for form submission
        $('#chatForm').on('submit', function(e) {
            e.preventDefault();
            const message = $('#message').val();
            sendMessage(message); // Send the message
        });

        // Event handler for file input
        $('#file').on('change', function() {
            const fileInput = this;
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const formData = new FormData();
                formData.append('file', file);
                formData.append('_token', $('input[name=_token]').val());

                $.ajax({
                    url: `/conversations/${conversationId}/send-file`,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response && response.file_path) {
                            appendMessage({ file_path: response.file_path, user_id: userId });
                        } else {
                            console.error('Invalid response:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending file:', error);
                    }
                });
            }
        });

        // Handle file input click
        $('#attachFilesButton').on('click', function() {
            $('#file').click();
        });

        // Initialize chat with user info and messages
        fetchUserInfo(userId);
        loadMessages(conversationId);
    });
</script>
