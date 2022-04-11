@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h2 class="ml-4 mt-4" style="font-family: auto;">Lead Source List</h2>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                        <a href="{{route('lead_source_create')}}" class="btn btn-success ml-4">Add Lead Source</a>
                        </div>
                    </div>
                    <div class="card-header">
                        @include('layouts.admin.alert')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="developer" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leadsources as $leadsource)
                                    <tr>
                                        <td>{{$leadsource->name}}</td>
                                        <td>{{$leadsource->short_name}}</td>
                                        <td>{{$leadsource->created_at}}</td>
                                        <td>{{$leadsource->updated_at}}</td>
                                        <td>
                                            @if($leadsource->status == 1)
                                            <a href="javascript:void(0)" class="btn btn-success leadsource" name="sourcestatus" data-id={{$leadsource->id}}>ON</a>
                                            @elseif($leadsource->status == 0)
                                            <a href="javascript:void(0)" class="btn btn-light leadsource" name="sourcestatus" data-id={{$leadsource->id}}>OFF</a>
                                            @endif
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
          <form method="post" id="lead_source_form"> 
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
