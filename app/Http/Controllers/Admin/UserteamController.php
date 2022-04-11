<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Userteam;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserteamRequest;
use App\Http\Requests\UpdateUserteamRequest;
use Illuminate\Support\Facades\File;

class UserteamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userteams = Userteam::all();

        return view('admin.userteam.index',compact('userteams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userteam.adteam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserteamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserteamRequest $request)
    {
        Userteam::create([
            'name' => $request->input('name'),
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('userteam.index')->with('success','User Team has been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userteam  $userteam
     * @return \Illuminate\Http\Response
     */
    public function show(Userteam $userteam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userteam  $userteam
     * @return \Illuminate\Http\Response
     */
    public function edit(Userteam $userteam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserteamRequest  $request
     * @param  \App\Models\Userteam  $userteam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserteamRequest $request, Userteam $userteam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userteam  $userteam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userteam = Userteam::findorFail($id);
        $userteam->delete();
        return redirect()->route('userteam.index')->with('success','Team has Deleted');
    }
}
