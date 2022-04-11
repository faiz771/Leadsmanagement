@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Assign Lead</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{route('assignlead.store')}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                        
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Project <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="project" id="getCountryId" required>
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
                                    <label for="inputText4" class="col-form-label">Leads </label>
                                    <select class="form-control" name="lead" id="getCountryId" required>
                                        <option disabled selected>Select Leads query</option>
                                    @php   
                                    $queries = App\Models\Query::all();
                                    @endphp
                                    @foreach($queries as $query)
                                    <option value="{{$query->id}}">{{$query->fname}} {{$query->lname}}</option>
                                     @endforeach  
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Assign to<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="user" id="getCountryId" >
                                        <option disabled selected>Select User</option>
                                    @php   
                                    $users = App\Models\User::all();
                                    @endphp
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                     @endforeach     
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
</div>
@endsection

