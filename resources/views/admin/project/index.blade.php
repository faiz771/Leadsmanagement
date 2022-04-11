@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 ml-4 mt-4" id="msg" style="font-family: auto;">Projects List</h2>
                        <div class="card-header">
                        @include('layouts.admin.alert')
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="developer" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->contact}}</td>
                                        <td>{{$project->created_at}}</td>
                                        <td>{{$project->updated_at}}</td>
                                        <td>
                                            <a href="{{route('projects.edit',$project->id)}}"><i class="fa fa-edit text-primary" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-top: 4px;" data-toggle="modal"></i></a>
                                            <a href="#" class="delete_btn6" data-route="{{route('projects.destroy',$project->id)}}"><i class=" fas fa-trash text-danger" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-left: 5px;" data-toggle="modal" data-target="#exampleModal"></i></a>
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
          <form method="post" id="delete_form6"> 
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

