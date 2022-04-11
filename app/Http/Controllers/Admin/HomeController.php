<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\UserloginNotification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    
    public function notify()
    {
        if (auth()->user()) {
            
            $user = User::first();
            auth()->user()->notify(new UserloginNotification($user));

        }

    }
}
