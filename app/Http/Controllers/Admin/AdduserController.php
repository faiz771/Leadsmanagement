<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdduserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.add-user');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        User::create([

            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contact' => $request->input('contact'),
            'whatsapp_number' => $request->input('whatsapp'),
            // 'role' => $request->input('role'),


        ]);

        return redirect()->route('add-users.index')->with('success','User has been Created');
    }

    public function destroy($id)
    {
        $dev = User::find($id);

        $dev->delete();
        
        return redirect()->route('add-users.index')->with('success','User has been Deleted');
    }

}
