<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.add-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        
        $validated = $request->validate([
            'project_image' => 'mimes:jpeg,jpg,png,gif|required|max:7000',
            'floor_plans' => 'mimes:jpeg,jpg,png,gif|required|max:7000',
            'payment_plan' => 'mimes:jpeg,jpg,png,gif|required|max:7000',
            'booklet' => 'mimes:jpeg,jpg,png,gif|required|max:7000',
            'name' => 'max:8',
        ]);

        if ($file = $request->file('project_image')) {
            $project_image = date('YmdHis').".". $file->extension();
            $file->move(public_path('projectpicture/'),$project_image);
        }else{
            $project_image = "";
        }

        if ($file = $request->file('floor_plans')) {
            $floor_plans = date('YmdHis').".". $file->extension();
            $file->move(public_path('floorplan/'),$floor_plans);
        }else{
            $floor_plans = "";
        }

        if ($file = $request->file('payment_plan')) {
            $payment_plan = date('YmdHis').".". $file->extension();
            $file->move(public_path('paymentplan/'),$payment_plan);
        }else{
            $payment_plan = "";
        }

        if ($file = $request->file('booklet')) {
            $booklet = date('YmdHis').".". $file->extension();
            $file->move(public_path('booklet_imgs/'),$booklet);
        }else{
            $booklet = "";
        }

        Project::create([

            'developer' => $request->input('developer'),
            'name' => $request->input('project_name'),
            'contact' => $request->input('contact'),
            'about' => $request->input('about'),
            'project_img' => $project_image,
            'floor_plan' =>  $floor_plans,
            'payment_plan' => $payment_plan,
            'project_booklet' =>  $booklet,
            'socialmedia_links' => $request->input('media'),
            'location' => $request->input('location'),

        ]);

        return redirect()->route('projects.index')->with('success','Project has been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findorFail($id);
        return view('admin.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $project)
    {

        $project = Project::findorfail($project);

        if ($file = $request->file('project_image')) {
            $project_image = date('YmdHis').".". $file->extension();
            $file->move(public_path('projectpicture/'),$project_image);
        }else{
            $project_image = "";
        }

        if ($file = $request->file('floor_plans')) {
            $floor_plans = date('YmdHis').".". $file->extension();
            $file->move(public_path('floorplan/'),$floor_plans);
        }else{
            $floor_plans = "";
        }

        if ($file = $request->file('payment_plan')) {
            $payment_plan = date('YmdHis').".". $file->extension();
            $file->move(public_path('paymentplan/'),$payment_plan);
        }else{
            $payment_plan = "";
        }

        if ($file = $request->file('booklet')) {
            $booklet = date('YmdHis').".". $file->extension();
            $file->move(public_path('booklet_imgs/'),$booklet);
        }else{
            $booklet = "";
        }

        $project->update([

            'developer' => $request->input('developer'),
            'name' => $request->input('project_name'),
            'contact' => $request->input('contact'),
            'about' => $request->input('about'),
            'project_img' => $project_image,
            'floor_plan' =>  $floor_plans,
            'payment_plan' => $payment_plan,
            'project_booklet' =>  $booklet,
            'socialmedia_links' => $request->input('media'),
            'location' => $request->input('location'),

        ]);
        return redirect()->route('projects.index')->with('success','Project has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findorFail($id);

        $project->delete();

        return redirect()->route('projects.index')->with('success','Project has Deleted');

    }
}
