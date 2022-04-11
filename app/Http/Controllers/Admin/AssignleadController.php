<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignlead;
use App\Http\Requests\StoreAssignleadRequest;
use App\Http\Requests\UpdateAssignleadRequest;
use Illuminate\Support\Facades\File;

class AssignleadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assigned = Assignlead::all();  
        return view('admin.lead.index',compact('assigned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lead.assignlead');
    }

    public function reassign_projectcreate()
    {
        $assigned = Assignlead::all();  
        return view('admin.lead.reassignproject',compact('assigned'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssignleadRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Assignlead::create([
            'lead' => $request->input('lead'),
            'project' => $request->input('project'),
            'user' => $request->input('user'),
        ]);
        return redirect()->route('assignlead.index')->with('success','Lead has been Assign');        
    }

    public function reassignproject(Request $request)
    {
        Assignlead::create([
            'lead' => $request->input('lead'),
            'project' => $request->input('project'),
            'user' => $request->input('user'),
        ]);
        return redirect()->route('assignlead.index')->with('success','Project has been Assign');        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignlead  $assignlead
     * @return \Illuminate\Http\Response
     */
    public function show(Assignlead $assignlead)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignlead  $assignlead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignlead = Assignlead::findorFail($id);
        return view('admin.lead.reassign_lead',compact('assignlead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignleadRequest  $request
     * @param  \App\Models\Assignlead  $assignlead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$assignlead)
    {
        $assignlead = Assignlead::findorfail($assignlead); 
        $assignlead->update([
            'user' => $request->input('reassign'),
        ]);
        return redirect()->route('assignlead.index')->with('success','Lead has been Reassign');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignlead  $assignlead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignlead = Assignlead::findorFail($id);
        $assignlead->delete();
        return redirect()->route('assignlead.index')->with('success','Lead has been Deleted');        
    }
}
