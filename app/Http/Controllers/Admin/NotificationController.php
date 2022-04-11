<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Notifications\UserRegistrationNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->get();
        Auth::user()->unreadNotifications->markAsRead();
        return view('admin.notifications.index',['notifications' => Auth::user()->notifications()->latest()->get()]);
    }


    public function destroy()
    {
        # code...
    }
}
