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
        $messages = Message::where('conversation_id', $conversationId)->get();
        return response()->json(['messages' => $messages]);
    }
    
    
    // Send a text message
    public function sendMessage(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $conversation = Conversation::findOrFail($conversationId);

            $message = Message::create([
                'message' => $request->input('message'),
                'conversation_id' => $conversation->id,
                'user_id' => auth()->id(),
            ]);

            // Optionally, broadcast the message (if using Pusher)
            // broadcast(new \App\Events\ChatMessage($message))->toOthers();

            return response()->json($message);
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Failed to send message for conversation ID ' . $conversationId . ': ' . $e->getMessage());
            
            return response()->json(['error' => 'Failed to send message.'], 500);
        }
    }

    // Send a file message
    public function sendFile(Request $request, $conversationId)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB file size limit
        ]);

        try {
            $conversation = Conversation::findOrFail($conversationId);

            $filePath = $request->file('file')->store('uploads', 'public');

            $message = Message::create([
                'file_path' => Storage::url($filePath),
                'conversation_id' => $conversation->id,
                'user_id' => auth()->id(),
            ]);

            // Optionally, broadcast the file message (if using Pusher)
            // broadcast(new \App\Events\FileMessage($message))->toOthers();

            return response()->json($message);
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Failed to send file for conversation ID ' . $conversationId . ': ' . $e->getMessage());
            
            return response()->json(['error' => 'Failed to send file.'], 500);
        }
    }
}
