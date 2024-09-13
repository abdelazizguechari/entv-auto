<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('admin.webapp.chate.chate');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();
    
        return response()->json(['message' => $request->get('message')]);
    }
    
    public function receive(Request $request)
    {
        return response()->json(['message' => $request->get('message')]);
    }
}