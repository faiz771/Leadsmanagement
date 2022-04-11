@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Add Query</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{route('queries.store')}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">First Name<span class="text-danger">*</span></label>
                                    <input id="Name" type="text" name="fname" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">Last Name</label>
                                    <input id="developerName" type="text" name="lname" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Contact Number</label>
                                    <input id="contactNumber" type="number" name="contact" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">Email</label>
                                    <input id="developerName" type="Email" name="email" class="form-control">
                                    <small id="errorName" class="text-danger"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Country</label>
                                    <select class="form-control" name="country" id="getCountryId" onchange="city()">
                                        <option disabled selected>Select Your Country</option>   
                                        @php   
                                    $countries = App\Models\Country::all();
                                    @endphp                               
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->country}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">City</label>
                                    <select class="form-control" name="city" id="getCityId">
                                    <option disabled selected>Select Your City</option>
                                    @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->city}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Area</label>
                                    <select class="form-control" name="area" id="getCountryId" >
                                        <option disabled selected>Select Your Area</option>                                     
                                            <option value=""></option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->area}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Sources<span class="text-danger">*</span></label>
                                    <select class="form-control" name="source" id="getCountryId" >
                                        <option disabled selected>Select Sources</option>
                                    @php   
                                    $sourses = App\Models\LeadSource::all();
                                    @endphp
                                        @foreach($sourses as $sourse)
                                            <option value="{{$sourse->id}}">{{$sourse->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Project<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="project" id="getCountryId" >
                                        <option disabled selected>Select Project</option>
                                    @php   
                                    $projects = App\Models\Project::all();
                                    @endphp
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                     @endforeach     
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Person </label>
                                    <select class="form-control" name="person" id="getCountryId" >
                                        <option disabled selected>Select Person</option>
                                        @php   
                                    $persons = App\Models\LeadPerson::all();
                                    @endphp
                                            @foreach($persons as $persons)
                                            <option value="{{$persons->name}}">{{$persons->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Description </label>
                                    <textarea class="form-control" name="" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- <div class="card">
                    <h5 class="card-header">Add Query With Excel File.</h5>
                    <div id="msg"></div>
                      <div class="card-body">
                        <form method="POST" action="{{url('/queriefile')}}" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                              <label for="">Select Excel File</label>
                              <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

