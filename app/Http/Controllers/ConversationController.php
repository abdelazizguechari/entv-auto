<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ConversationController extends Controller
{


        public function index()
    {

        $users = User::where('id', '!=', auth()->id())->get();
        $currentUserId = auth()->user();

         return view('admin.webapp.chate.chate',compact('users','currentUserId'));
    }

    
    public function showOrCreateConversation(Request $request, $id)
{
    $userId = $id;
    $currentUserId = auth()->id();

    // Check if a conversation already exists between the two users
    $existingConversation = ConversationParticipant::select('conversation_id')
        ->whereIn('user_id', [$userId, $currentUserId])
        ->groupBy('conversation_id')
        ->havingRaw('COUNT(user_id) = 2')
        ->first();

    if ($existingConversation) {
        $conversationId = $existingConversation->conversation_id;
    } else {
        // Create a new conversation
        $conversation = Conversation::create([
            'title' => User::find($userId)->firstname . ' ' . User::find($userId)->lastname,
        ]);

        $conversationId = $conversation->id;

        // Add participants to the new conversation
        ConversationParticipant::create(['conversation_id' => $conversationId, 'user_id' => $currentUserId]);
        ConversationParticipant::create(['conversation_id' => $conversationId, 'user_id' => $userId]);
    }

    // Fetch the conversation with participants and messages
    $conversation = Conversation::with(['participants', 'messages'])->findOrFail($conversationId);

    // Fetch the user who is not the currently authenticated user
    $user = User::findOrFail($id);

    // Pass the conversation and user data to the view
    return view('admin.webapp.chate.conversation', [
        'conversation' => $conversation,
        'user' => $user,
        'conversationId' => $conversationId
    ]);
}

    

  
}
