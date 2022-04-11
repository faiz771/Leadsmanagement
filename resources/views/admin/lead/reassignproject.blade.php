@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Reassign same Leads in other Project</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{url('/reassignproject')}}" enctype="multipart/form-data">
                        @method('PUT')
                            <div class="row">
                                @csrf
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Project<span class="text-danger">*</span> </label>                                   
                                    <select class="form-control" name="project" id="getCountryId">
                                    <option value="" disabled selected>Select Project</option>  
                                    @foreach($assigned as $assigne)
                                    @php  
                                    $projects = App\Models\Project::all();
                                    @endphp
                                    @endforeach    
                                    @if($projects != '')
                                    @foreach($projects as $project)
                                        @if($project->id != $assigne->project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                        @endif
                                    @endforeach    
                                    @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Leads </label>
                                <select class="form-control" name="lead" id="getCountryId">
                                <option value="" disabled selected>Select Lead</option>      
                                @foreach($assigned as $assigne)
                                    @php   
                                    $queries = App\Models\Query::where('id',$assigne->lead)->get();
                                    @endphp
                                @endforeach    

                                    @if($queries != '')
                                    @foreach($queries as $query)
                                    <option value="{{$query->id}}">{{$query->fname}} {{$query->lname}}</option>
                                    @endforeach  
                                    @endif 
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">User<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="user" id="getCountryId"> 
                                    <option value="" disabled selected>Select User</option>  
                                    @foreach($assigned as $assigne)
                                    @php   
                                    $users = App\Models\User::all();
                                    @endphp
                                    @endforeach    
                                    @if($users != '')
                                    @foreach($users as $user)
                                    @if($user->id != $assigne->user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                     @endif 
                                     @endforeach    
                                     @endif 
                                    </select>
                                </div>
                             </div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

