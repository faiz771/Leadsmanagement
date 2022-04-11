<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->get();
        Auth::user()->unreadNotifications->markAsRead();
        return view('user.notifications.index',['notifications' => Auth::user()->notifications()->latest()->get()]);
    }


    public function destroy()
    {
        # code...
    }
}
