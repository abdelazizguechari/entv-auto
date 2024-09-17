$(document).ready(function() {
    let selectedConversationId = localStorage.getItem('selectedConversationId') || null;

    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Load messages for the selected conversation
    function loadMessages(conversationId) {
        $('.messages').html(''); // Clear current messages
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
                alert('Error: Failed to load messages.');
            });
    }

    // Fetch user information
    function fetchUserInfo(userId) {
        console.log(`Fetching user info for user ID: ${userId}`);
        let url = `/users/${userId}`;
        console.log(`Request URL: ${url}`);
        
        $.get(url)
            .done(function(data) {
                console.log('User data:', data);
                if (!data) {
                    console.error('Invalid user data:', data);
                    alert('Error: Failed to fetch user info.');
                    return;
                }

                let imageUrl = data.photo ? `/uplode/admin_images/${data.photo}` : '/uplode/no_image.jpg';
                $('#userImage').attr('src', imageUrl);
                
                $('#userStatus').removeClass('online offline');
                $('#userStatus').addClass(data.status);

                $('#conversationTitle').text(`${data.firstname} ${data.lastname}`);
                $('#userPosition').text(data.position);
            })
            .fail(function(xhr, status, error) {
                console.error('Error fetching user info:', error);
                alert('Error: Unable to fetch user info.');
            });
    }

    // Create a new conversation with a user
    function createConversation(userId) {
        $.post('/conversations', { user_id: userId })
            .done(function(data) {
                console.log('Conversation created:', data);
                selectedConversationId = data.conversation_id;
                localStorage.setItem('selectedConversationId', selectedConversationId);
                loadMessages(selectedConversationId);
            })
            .fail(function(xhr, status, error) {
                console.error('Error creating conversation:', error);
                alert('Error: Unable to create conversation.');
            });
    }

    // Event handler for starting a chat with a user
    $('.start-chat').on('click', function() {
        let userId = $(this).data('id');
        fetchUserInfo(userId);
        createConversation(userId);
    });

    // Send a text message
    $('#sendMessageButton').on('click', function() {
        let messageText = $('#message').val();
        let formData = new FormData();
        formData.append('message', messageText);
        formData.append('conversation_id', selectedConversationId);

        $.ajax({
            url: '/messages',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#message').val('');
                loadMessages(selectedConversationId);
            },
            error: function(xhr, status, error) {
                console.error('Error sending message:', error);
                alert('Error: Unable to send message.');
            }
        });
    });

    // Attach a file
    $('#attachFilesButton').on('click', function() {
        $('#file').click();
    });

    // Handle file selection and upload
    $('#file').on('change', function() {
        let formData = new FormData();
        formData.append('file', this.files[0]);
        formData.append('conversation_id', selectedConversationId);

        $.ajax({
            url: '/files',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                loadMessages(selectedConversationId);
            },
            error: function(xhr, status, error) {
                console.error('Error uploading file:', error);
                alert('Error: Unable to upload file.');
            }
        });
    });

    // Back to chat list
    $('#backToChatList').on('click', function() {
        $('.chat-content').hide();
        $('.chat-aside').show();
    });
});
