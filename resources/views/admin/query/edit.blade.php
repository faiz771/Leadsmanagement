@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Add Query</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{route('queries.update',$query->id)}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                            @method('PUT')    
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">First Name<span class="text-danger">*</span></label>
                                    <input id="Name" type="text" name="fname" value="{{$query->fname}}" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">Last Name</label>
                                    <input id="developerName" type="text" name="lname" value="{{$query->lname}}" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Contact Number</label>
                                    <input id="contactNumber" type="number" name="contact" value="{{$query->contact}}" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">Email</label>
                                    <input id="developerName" type="Email" name="email" value="{{$query->email}}" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Country</label>
                                    <select class="form-control" name="country" id="getCountryId" onchange="city()">
                                        <option disabled selected>Select Your Country</option>                                  
                                            <option value=""></option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">City</label>
                                    <select class="form-control" name="city" id="getCityId">
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Area</label>
                                    <select class="form-control" name="area" id="getCountryId" >
                                        <option disabled selected>Select Your Area</option>                                     
                                            <option value=""></option>
                                            <option value="area">area</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Sources<span class="text-danger">*</span></label>
                                    <select class="form-control" name="source" id="getCountryId" >
                                        <option disabled selected>Select Sources</option>
                                            <option value=""></option>
                                    </select>
                                </div>

                                @php   
                                $projec = App\Models\Project::where('id',$query->project_id)->first();
                                $projects = App\Models\Project::all();
                                @endphp

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Project<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="project" id="getCountryId" >
                                    @if($projec != '')
                                    <option value="{{$projec->id}}" selected>{{$projec->name}}</option>  
                                    @endif                              
                                    @foreach($projects as $project)
                                    @if($project->id != $query->project_id)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endif
                                     @endforeach     
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Person</label>
                                    <select class="form-control" name="person" id="getCountryId" >
                                        <option disabled selected>Select Project</option>
                                            <option value=""></option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Description </label>
                                    <textarea class="form-control" name="" id="desc" rows="3">{{$query->desc}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <h5 class="card-header">Add Query With Excel File.</h5>
                    <div id="msg"></div>
                      <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                              <label for="">Select Excel File</label>
                              <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

