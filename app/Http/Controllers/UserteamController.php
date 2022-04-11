<?php

namespace App\Http\Controllers;

use App\Models\Userteam;
use App\Http\Requests\StoreUserteamRequest;
use App\Http\Requests\UpdateUserteamRequest;

class UserteamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserteamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserteamRequest $request)
    {
        //
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
    public function destroy(Userteam $userteam)
    {
        //
    }
}
