@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Reassign Lead</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{route('assignlead.update',$assignlead->id)}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @method('PUT')    
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                        
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Project <span class="text-danger">*</span> </label>
                                    @php   
                                    $projects = App\Models\Project::where('id',$assignlead->project)->first();
                                    @endphp
                                    <select class="form-control" name="project" id="getCountryId" readonly>
                                        <option value="">{{$projects->name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Leads </label>
                                    <select class="form-control" name="lead" id="getCountryId" readonly>
                                    @php   
                                    $queries = App\Models\Query::where('id',$assignlead->lead)->first();
                                    @endphp
                                    <option selected value="">{{$queries->fname}} {{$queries->lname}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Assign<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="user" id="getCountryId" readonly> 
                                    @php   
                                    $user = App\Models\User::where('id',$assignlead->user)->first();
                                    @endphp
                                    <option value="{{$user->id}}">{{$user->name}}</option>    
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Reassign to<span class="text-danger">*</span> </label>
                                    <select class="form-control" name="reassign" id="getCountryId"> 
                                    <option value="" disabled selected>Select User</option>                                       
                                    @php   
                                    $users = App\Models\User::all();
                                    @endphp
                                    @if($users != '')
                                    @foreach($users as $user)
                                    @if($user->id != $assignlead->user)
                                     <option value="{{$user->id}}">{{$user->name}}</option>
                                     @endif 
                                     @endforeach    
                                     @endif 
                                    </select>
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

