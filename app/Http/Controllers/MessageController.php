<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    // Get all messages for a specific conversation
    public function getMessages($conversationId)
    {
        try {
            $conversation = Conversation::findOrFail($conversationId);
            $messages = $conversation->messages()->get();
    
            return response()->json([
                'messages' => $messages,
                'current_user_id' => auth()->id()
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching messages: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load messages.'], 500);
        }
    }
    
    // Send a text message
    public function sendMessage(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $conversation = Conversation::findOrFail($conversationId);

        $message = Message::create([
            'message' => $request->input('message'),
            'conversation_id' => $conversation->id,
            'user_id' => auth()->id(),
        ]);

        // Optionally, broadcast the message (if using Pusher)
        // broadcast(new \App\Events\ChatMessage($message))->toOthers();

        return response()->json($message);
    }

    // Send a file message
    public function sendFile(Request $request, $conversationId)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB file size limit
        ]);

        $conversation = Conversation::findOrFail($conversationId);

        $filePath = $request->file('file')->store('uploads', 'public');

        $message = Message::create([
            'file_path' => Storage::url($filePath),
            'conversation_id' => $conversation->id,
            'user_id' => auth()->id(),
        ]);

        // Optionally, broadcast the file message (if using Pusher)
        broadcast(new \App\Events\FileMessage($message))->toOthers();

        return response()->json($message);
    }
}
