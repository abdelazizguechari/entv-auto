<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{

    
    public function createConversation(Request $request)
    {
        $userId = $request->input('user_id');
        $currentUserId = auth()->id();
    
        // Ensure that we are not creating a conversation with the same user
        if ($userId === $currentUserId) {
            return response()->json(['error' => 'Cannot start a conversation with yourself.'], 400);
        }
    
        // Check if a conversation already exists between these two users
        $existingConversation = Conversation::whereHas('participants', function($query) use ($userId, $currentUserId) {
            $query->whereIn('user_id', [$userId, $currentUserId]);
        })->withCount('participants')->having('participants_count', 2)->first();
    
        if ($existingConversation) {
            return response()->json(['conversation' => $existingConversation]);
        }
    
        // Create a new conversation
        $conversation = Conversation::create([
            'title' => 'Conversation between ' . User::find($userId)->name . ' and ' . User::find($currentUserId)->name,
        ]);
    
        // Add participants
        $conversation->participants()->createMany([
            ['user_id' => $userId],
            ['user_id' => $currentUserId]
        ]);
    
        return response()->json(['conversation' => $conversation]);
    }
    
        
    }
    

