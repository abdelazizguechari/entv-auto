<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function show($notificationId)
{
    $notification = Auth::user()->notifications()->findOrFail($notificationId);

    if (!$notification->read_at) {
        $notification->markAsRead();
    }
    
    return view('notifications.show', ['notification' => $notification]);
}

}