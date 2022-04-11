<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Support\Facades\File;
class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();

        return view('admin.developer.index',compact('developers'));
    }

    public function create()
    {
        return view('admin.developer.add-developer');
    }

    public function store(Request $request)
    {
        if ($file = $request->file('logo')) {
            $logoimage = date('YmdHis').".". $file->extension();
            $file->move(public_path('logo_imgs/'),$logoimage);
        }else{
            $logoimage = "";
        }

        if ($file = $request->file('booklet')) {
            $bookletimage = date('YmdHis').".". $file->extension();
            $file->move(public_path('booklet_imgs/'),$bookletimage);
        }else{
            $bookletimage = "";
        }

        // $request->validate([

        //     'name' => 'required|max:255',
        //     'contact' => 'required|max:255',
        //     'country_id' => 'required|max:255',
        //     'city_id' => 'required|max:255',
        //     'logo' => 'required|mimes:jpeg,bmp,png|size:5000',
        //     'about' => 'required|max:255',
        //     'location' => 'required|max:255',
        //     'booklet' => 'required|mimes:jpeg,bmp,png|size:5000',
        //     'social_media' => 'required|max:255',
        // ]);

        Developer::create([

            'name' => $request->input('developerName'),
            'contact' => $request->input('contactNumber'),
            'country_id' => $request->input('country'),
            'city_id' => $request->input('city'),
            'logo' => $logoimage,
            'about' =>  $request->input('about'),
            'location' => $request->input('location'),
            'booklet' =>  $bookletimage,
            'social_media' => $request->input('media'),

        ]);

        return redirect()->route('developers.index')->with('success','Developer has been Created');
    }

    public function show()
    {

    }
    public function edit($id)
    {
        $developer = Developer::findorFail($id);

        return view('admin.developer.edit-developer',compact('developer'));
    }
    public function update(Request $request, $developer)
    {

        $developer = Developer::findorfail($developer);

        if ($file = $request->file('logo')) {
            $destinationlogo = 'logo_imgs/'.$developer->image;
            if(File::exists($destinationlogo)){
                File::delete($destinationlogo);
            }
            $image = date('YmdHis').".". $file->extension();
            $file->move(public_path('logo_imgs/'),$image);
        }else{
            $image = $developer->logo;
        }

        if ($file = $request->file('booklet')) {
            $destinationbooklet = 'booklet_imgs/'.$developer->image;
            if(File::exists($destinationbooklet)){
                File::delete($destinationbooklet);
            }
            $image = date('YmdHis').".". $file->extension();
            $file->move(public_path('booklet_imgs/'),image);
        }else{
            $image = "";
        }

        $developer->update([

            'name' => $request->input('developerName'),
            'contact' => $request->input('contactNumber'),
            'country_id' => $request->input('country'),
            'city_id' => $request->input('city'),
            'logo' => $image,
            'about' =>  $request->input('about'),
            'location' => $request->input('location'),
            'booklet' =>  $image,
            'social_media' => $request->input('media'),

        ]);

        return redirect()->route('developers.index')->with('success','Developer has updated');
    }
    public function destroy($id)
    {
        $developer = Developer::findorFail($id);
        $developer->delete();
        return view('admin.developer.edit');
    }
}
