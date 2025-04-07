<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }


    public function markAllAsRead()
{
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
}
    public function show_notifications(){
        return view('notification');
    }

}
