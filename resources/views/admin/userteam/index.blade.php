@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 ml-4 mt-4" id="msg" style="font-family: auto;">Team List 
                        <i class="fa fa-info-circle txt16normal" style="font-size: 15px !important;line-height: 22px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List of Team User"></i>
                    </h2>
                        <div class="panel-heading" align="right">
                        <a href="{{route('userteam.create')}}" class="btn btn-success text-light">Add New User Team</a>
                         </div>

                        <div class="card-header">
                        @include('layouts.admin.alert')
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                @foreach($userteams as $userteam)
                                  @php 
                                    $users = App\Models\User::wherein('id',$userteam->user_id)->get();                                                                    
                                  @endphp
                                                      

                                    <tr>
                                        <td>{{$userteam->name}}</td>                                        
                                        <td>{{$userteam->created_at}}</td>
                                        <td>{{$userteam->updated_at}}</td>
                                        <td>
                                            <a href="#"><i class=" fas fa-eye text-dark" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-left: 5px;" data-toggle="modal" data-target="#showuser"></i></a>
                                            <a href="#" class="delete_btn_user_team" data-route="{{route('lead_user_team_delete',$userteam->id)}}"><i class=" fas fa-trash text-danger" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-left: 5px;" data-toggle="modal" data-target="#exampleModal"></i></a>
                                       
<div class="modal fade" id="showuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Team User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div>
                <table id="leadCategory" class="display table" style="width: 100%; cellspacing: 0;">
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>
                {{$user->name}},
              </td>
              <td>
                {{$user->email}},
              </td>
            </tr>
            @endforeach()     
          </tbody>  
          </table>
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
        </div>
      </div>
    </div>
  </div>

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
          <form method="post" id="delete_form_user_team"> 
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

