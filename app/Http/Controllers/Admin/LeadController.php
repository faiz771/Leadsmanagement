<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LeadCategory;
use App\Models\LeadPerson;
use App\Models\LeadStatus;
use App\Models\LeadSource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function index()
    {
        $leads = LeadCategory::all();
        return view('admin.lead-category.index',compact('leads'));
    }
    public function create()
    {
        return view('admin.lead-category.lead-category');
    }
    public function store(Request $request)
    {
        LeadCategory::create([

            'name' => $request->input('name'),

        ]);

        return redirect()->route('leads.index')->with('success','Lead Category has been created');
    }

    public function edit($id)
    {
       $lead = LeadCategory::findOrFail($id);

       return view('admin.lead-category.edit',compact('lead'));
    }
    public function leadStatusChange($id , Request $request)
    {
        
        $coupon=LeadCategory::findorFail($id);

        $result = 0;
        if ($coupon->status > 0) {
            
           $coupon->update(['status' => 0]);
           return $result=0;
 
        } else {
            
           $coupon->update(['status' => 1]);
           $request->session()->flash('success' , 'Status Updated Successfully');
           return $result=1;
        }

        return $result; 

    }
    public function update(Request $request, $id)
    {
        $lead = LeadCategory::findOrFail($id);

        $lead->update([

            'name' => $request->input('name'),

        ]);

        return redirect()->route('leads.index')->with('success','Lead Category has been Updated');
    }
    public function destroy($id)
    {
        $lead = LeadCategory::findorFail($id);

        $lead->delete();

        return redirect()->route('leads.index')->with('success','Lead Category has been Deleted');
    }

    public function lead_person_index()
    {
        $leadpersons = LeadPerson::all();

        return view('admin.lead-person.index',compact('leadpersons'));
    }

    public function lead_person_create()
    {
        return view('admin.lead-person.lead-person');
    }
    public function lead_person_store(Request $request)
    {
        LeadPerson::create([

            'name' => $request->input('name'),

        ]);

        return redirect()->route('lead-person-list')->with('success','Lead Person has been created');
    }
    public function leadpersonStatusChange($id , Request $request)
    {
        
        $coupon=LeadPerson::findorFail($id);

        $result = 0;
        if ($coupon->status > 0) {
            
           $coupon->update(['status' => 0]);
           return $result=0;
 
        } else {
            
           $coupon->update(['status' => 1]);
           $request->session()->flash('success' , 'Status Updated Successfully');
           return $result=1;
        }

        return $result; 

    }

    public function lead_person_destroy($id)
    {
        $lead = LeadPerson::findorFail($id);

        $lead->delete();

        return redirect()->route('lead-person-list')->with('success','Lead Person has been Deleted');
    }

    public function lead_source_index()
    {
        $leadsources = LeadSource::all();

        return view('admin.lead-source.index',compact('leadsources'));
    }
    public function lead_source_create()
    {
        return view('admin.lead-source.lead-source');
    }

    public function lead_source_store(Request $request)
    {
        LeadSource::create([

            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),

        ]);

        return redirect()->route('lead-source-list')->with('success','Lead Source has been created');
    }
    public function leadsourceStatusChange($id , Request $request)
    {
        
        $coupon=LeadSource::findorFail($id);

        $result = 0;
        if ($coupon->status > 0) {
            
           $coupon->update(['status' => 0]);
           return $result=0;
 
        } else {
            
           $coupon->update(['status' => 1]);
           $request->session()->flash('success' , 'Status Updated Successfully');
           return $result=1;
        }

        return $result; 

    }


    public function lead_status_index()
    {
        $leadstatuss = LeadStatus::all();

        return view('admin.lead-status.index',compact('leadstatuss'));
    }
    public function lead_status_create()
    {
        return view('admin.lead-status.lead-status');
    }

    public function lead_status_store(Request $request)
    {
        LeadStatus::create([

            'name' => $request->input('name'),

        ]);

        return redirect()->route('lead-status-list')->with('success','Lead Status has been created');
    }
    public function leadstatusStatusChange($id , Request $request)
    {
        
        $coupon=LeadStatus::findorFail($id);

        $result = 0;
        if ($coupon->status > 0) {
            
           $coupon->update(['status' => 0]);
           return $result=0;
 
        } else {
            
           $coupon->update(['status' => 1]);
           $request->session()->flash('success' , 'Status Updated Successfully');
           return $result=1;
        }

        return $result; 

    }
}
