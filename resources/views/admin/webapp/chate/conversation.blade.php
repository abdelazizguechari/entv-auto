@extends('admin.dash')

@section('admin')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <!-- Chat Header -->
            <div class="chat-header border-bottom pb-2">
                <div class="d-flex align-items-center">
                    <figure class="mb-0 me-2">
                        <img id="userImage" class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="user image">
                        <div id="userStatus" class="status online"></div>
                    </figure>
                    <div>
                        <p id="conversationTitle">Conversation Title</p>
                        <p id="userPosition" class="text-muted tx-13"></p>
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
                <form id="chatForm" class="search-form flex-grow-1 me-2">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" id="message" name="message" placeholder="Type a message" autocomplete="off">
                        <input type="file" id="file" name="file" class="d-none">
                    </div>
                </form>
                <div>
                    <button type="button" class="btn btn-primary btn-icon rounded-circle" id="sendMessageButton">
                        <i data-feather="send"></i>
                    </button>
                    <button type="button" class="btn border btn-icon rounded-circle me-2" data-bs-toggle="tooltip" data-bs-title="Attach files" id="attachFilesButton">
                        <i data-feather="paperclip" class="text-muted"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let userId = @json($user->id); // Pass user ID from PHP to JavaScript
    let conversationId = @json($conversationId); // Pass conversation ID from PHP to JavaScript

    function fetchUserInfo(userId) {
        $.get(`/users/${userId}`)
            .done(function(data) {
                let imageUrl = data.photo ? `/uplode/admin_images/${data.photo}` : '/uplode/no_image.jpg';
                $('#userImage').attr('src', imageUrl);
                
                $('#userStatus').removeClass('online offline');
                $('#userStatus').addClass(data.status);

                $('#conversationTitle').text(`${data.firstname} ${data.lastname}`);
                $('#userPosition').text(data.position);
            })
            .fail(function(xhr, status, error) {
                console.error('Error fetching user info:', error);
            });
    }

    function loadMessages(conversationId) {
        $('.messages').html('');
        $.get(`/conversations/${conversationId}/messages`)
            .done(function(data) {
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
                        let messageContent = message.file_path ? 
                            `<p>${message.message}</p><a href="${message.file_path}" download>Download File</a>` : 
                            `<p>${message.message}</p>`;
                        
                        $('.messages').append(`<li class="${messageClass}">${messageContent}</li>`);
                    });
                }

                $('.messages').scrollTop($('.messages')[0].scrollHeight);
            })
            .fail(function(xhr, status, error) {
                console.error('Error loading messages:', error);
            });
    }

    function sendMessage() {
        let messageText = $('#message').val();
        let formData = new FormData();
        formData.append('message', messageText);
        formData.append('conversation_id', conversationId);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '/messages',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#message').val('');
                loadMessages(conversationId);
            },
            error: function(xhr, status, error) {
                console.error('Error sending message:', error);
            }
        });
    }

    function uploadFile() {
        let formData = new FormData();
        formData.append('file', $('#file')[0].files[0]);
        formData.append('conversation_id', conversationId);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '/files',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                loadMessages(conversationId);
            },
            error: function(xhr, status, error) {
                console.error('Error uploading file:', error);
            }
        });
    }

    $('#sendMessageButton').on('click', function() {
        sendMessage();
    });

    $('#attachFilesButton').on('click', function() {
        $('#file').click();
    });

    $('#file').on('change', function() {
        uploadFile();
    });

    // Initialize chat with user info and messages
    fetchUserInfo(userId);
    loadMessages(conversationId);
});
</script>
@endsection
