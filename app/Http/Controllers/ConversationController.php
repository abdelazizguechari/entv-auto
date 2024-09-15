<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
    
        // Fetch user names for the conversation title
        $userName = User::find($userId)->name ?? 'Unknown User';
        $currentUserName = User::find($currentUserId)->name ?? 'You';

        // Create a new conversation
        $conversation = Conversation::create([
            'title' => 'Conversation with ' . User::find($contactUserId)->firstname,
        ]);

        // Add participants to the new conversation
        $conversation->participants()->createMany([
            ['user_id' => $userId],
            ['user_id' => $currentUserId]
        ]);
    
        return response()->json(['conversation' => $conversation]);
    }

    // New method to get conversation details
    public function getConversationDetails($conversationId)
    {
        try {
            $conversation = Conversation::with('participants.user')->findOrFail($conversationId);

            $participants = $conversation->participants->map(function ($participant) {
                return [
                    'name' => $participant->user->name,
                    'email' => $participant->user->email
                ];
            });

            return response()->json([
                'conversation' => [
                    'title' => $conversation->title,
                    'participants' => $participants
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching conversation details: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load conversation details.'], 500);
        }
    }
}
