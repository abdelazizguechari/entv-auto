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


    $users = User::all(); // Retrieve all users
    return view('admin.webapp.chate.chate', compact('users'));


    }
    
    // Method to create a new conversation
//     public function createConversation(Request $request)
// {
//     $userId = $request->input('user_id');
//     $currentUserId = auth()->id();

//     // Check if conversation exists
//     $conversation = Conversation::whereHas('participants', function($query) use ($userId, $currentUserId) {
//         $query->whereIn('user_id', [$userId, $currentUserId]);
//     })->first();

//     if ($conversation) {
//         return response()->json(['conversation' => $conversation]);
//     }

//     // Create new conversation
//     $conversation = Conversation::create([
//         'title' => 'Conversation with User ' . $userId,
//     ]);

//     // Add participants
//     ConversationParticipant::create([
//         'conversation_id' => $conversation->id,
//         'user_id' => $userId,
//     ]);
//     ConversationParticipant::create([
//         'conversation_id' => $conversation->id,
//         'user_id' => $currentUserId,
//     ]);

//     return response()->json(['conversation' => $conversation]);
// }


//     // Method to get conversation details
//     public function getConversationDetails($conversationId)
//     {
//         try {
//             $conversation = Conversation::with('participants.user')->findOrFail($conversationId);

//             $participants = $conversation->participants->map(function ($participant) {
//                 return [
//                     'name' => $participant->user->name,
//                     'email' => $participant->user->email,
//                     'photo' => $participant->user->photo // Add photo URL if needed
//                 ];
//             });

//             return response()->json([
//                 'conversation' => [
//                     'title' => $conversation->title,
//                     'participants' => $participants
//                 ]
//             ]);
//         } catch (\Exception $e) {
//             Log::error('Error fetching conversation details: ' . $e->getMessage());
//             return response()->json(['error' => 'Failed to load conversation details.'], 500);
//         }
//     }


public function show($userId)
{
    // Find the user or fail
    $user = User::findOrFail($userId);
    
    // Get or create the conversation
    $conversation = $this->getOrCreateConversation(auth()->id(), $userId);

    // Return the view with the conversation ID and user details
    return view('admin.webapp.chate.conversation', [
        'conversationId' => $conversation->id,
        'user' => $user,
    ]);
}

public function contacts()
{
    $currentUserId = auth()->id();
    $users = User::where('id', '!=', $currentUserId)->get();
    
    return view('admin.webapp.chate.conversation', ['users' => $users]);
}

protected function getOrCreateConversation($currentUserId, $contactUserId)
{
    // Check for an existing conversation between the two users
    $conversation = Conversation::whereHas('participants', function ($query) use ($currentUserId, $contactUserId) {
        $query->whereIn('user_id', [$currentUserId, $contactUserId]);
    })->whereHas('participants', function ($query) use ($contactUserId) {
        $query->where('user_id', $contactUserId);
    })->first();

    // If conversation does not exist, create a new one
    if (!$conversation) {
        $conversation = Conversation::create([
            'title' => 'Conversation with ' . User::find($contactUserId)->firstname,
        ]);

        // Add participants to the new conversation
        $conversation->participants()->createMany([
            ['user_id' => $currentUserId],
            ['user_id' => $contactUserId],
        ]);
    }

    return $conversation;
}
}

    

