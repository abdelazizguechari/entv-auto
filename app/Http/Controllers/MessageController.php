<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Events\MessageSent;

class MessageController extends Controller
{


    public function getMessages($conversationId)
    {
        $messages = Message::where('conversation_id', $conversationId)->get();
        return response()->json(['messages' => $messages]);
    }
    

    public function sendMessage(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
    
        $message = $conversation->messages()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
    
        broadcast(new MessageSent($message))->toOthers();
    
        return response()->json(['message' => $message]);
    }
    

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

      
            return response()->json($message);
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Failed to send file for conversation ID ' . $conversationId . ': ' . $e->getMessage());
            
            return response()->json(['error' => 'Failed to send file.'], 500);
        }
    }
}
