@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 ml-4 mt-4" id="msg" style="font-family: auto;">Lead List</h2>
                        <div class="card-header">
                        @include('layouts.admin.alert')
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="developer" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Lead</th>
                                        <th>Assigned to</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assigned as $assign)
                                    @php   
                                    $query = App\Models\Query::where('id',$assign->lead)->first();
                                    $project = App\Models\Project::where('id',$assign->project)->first();
                                    $user = App\Models\User::where('id',$assign->user)->first();
                                    @endphp

                                    <tr>  
                                    <td>
                                        @if($project != '')                                           
                                        {{$project->name}}
                                    @endif
                                    </td>                                    
                                        <td>
                                            @if($query != '')
                                            {{$query->fname}} {{$query->lname}}
                                            @endif
                                        </td> 
                                        <td>
                                        @if($user != '')                                           
                                            
                                        {{$user->name}}
                                    @endif
                                    </td>                                       
                                        <td>{{$assign->created_at}}</td>
                                        <td>{{$assign->updated_at}}</td>
                                        <td>
                                            <a href="{{route('assignlead.edit',$assign->id)}}" class="btn btn-success btn btn-success btn-sm" style="color: #fff;background-color: #0e0c28;border-color: #0e0c28;">Reassign</a>
                                            <a href="#" class="delete_btn4" data-route="{{route('assignlead.destroy',$assign->id)}}"><i class=" fas fa-trash text-danger" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-left: 5px;" data-toggle="modal" data-target="#exampleModal"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Are You Sure ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="post" id="delete_form4"> 
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

