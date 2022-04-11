<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Query;
use App\Http\Requests\StoreQueryRequest;
use App\Http\Requests\UpdateQueryRequest;
use Illuminate\Support\Facades\File;
use Validator;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = Query::all();
        
        return view('admin.query.index',compact('queries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.query.add-query');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQueryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Query::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'city_id' => $request->input('city'),
            'country_id' => $request->input('country'),
            'project_id' => $request->input('project'),
            'area_id' => $request->input('area'),
            'sources_id' => $request->input('source'),
            'desc' => $request->input('desc'),
            'person_id' => $request->input('person'),
        ]);
        return redirect()->route('queries.index')->with('success','Query has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */

    public function fileadd(Request $request)
    {
 
    }

    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Query::findorFail($id);
        return view('admin.query.edit',compact('query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQueryRequest  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request,$query)
    {
        $query = Query::findorfail($query);
        $query->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'city_id' => $request->input('city'),
            'country_id' => $request->input('country'),
            'project_id' => $request->input('project'),
            'area_id' => $request->input('area'),
            'sources_id' => $request->input('source'),
            'desc' => $request->input('desc'),
            'person_id' => $request->input('person'),
        ]);
        return redirect()->route('queries.index')->with('success','Query has updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Query = Query::findorFail($id);
        $Query->delete();
        return redirect()->route('queries.index')->with('success','Query has Deleted');
    }
}
