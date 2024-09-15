<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;

class PusherController extends Controller



{


    


    public function index()
    {
        $conversations = auth()->user()->conversations;
        $enligne = auth()->user();

       
            $users = User::where('id' ,'!=' ,auth()->id())
            ->get();;

            $role = auth()->user();
           $roles = $role->getRoleNames(); // Returns a collection of role names

        

         return view('admin.webapp.chate.chate',compact('conversations','users','enligne','roles'));
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        return view('admin.webapp.chate.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('admin.webapp.chate.receive', ['message' => $request->get('message')]);
    }


    // public function sendMessage(Request $request)
    // {
    //     // Validate message
    //     $request->validate([
    //         'message' => 'required|string',
    //     ]);

    //     // Broadcast the message (optional: save to DB)
    //     broadcast(new \App\Events\ChatMessage($request->message))->toOthers();

    //     // Return the message as a view component to be added to the chat
    //     return view('admin.webapp.chate.receive', ['message' => $request->message]);
    // }

    // public function sendFile(Request $request)
    // {
    //     // Validate file upload
    //     $request->validate([
    //         'file' => 'required|file|max:10240', // Limit to 10MB, adjust as needed
    //     ]);

    //     // Store file in the 'public' directory (or use any other disk)
    //     $path = $request->file('file')->store('uploads', 'public');

    //     // Broadcast the file URL to the chat (optional: save to DB)
    //     broadcast(new \App\Events\FileMessage(Storage::url($path)))->toOthers();

    //     // Return the file link as a view component to be added to the chat
    //     return view('admin.webapp.chate.file', ['fileUrl' => Storage::url($path)]);
    // }
}