@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h2 class="ml-4 mt-4" style="font-family: auto;">Lead Category List</h2>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                        <a href="{{route('leads.create')}}" class="btn btn-success ml-4">Add Lead Category</a>
                        </div>
                    </div>
                    <div class="card-header">
                        @include('layouts.admin.alert')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                    <tr>
                                        <td>{{$lead->name}}</td>
                                        <td>{{$lead->created_at}}</td>
                                        <td>{{$lead->updated_at}}</td>
                                        <td>
                                            @if($lead->status == 1)
                                            <a href="javascript:void(0)" class="btn btn-success status" name="status" data-id={{$lead->id}}>ON</a>
                                            @elseif($lead->status == 0)
                                            <a href="javascript:void(0)" class="btn btn-light status" name="status" data-id={{$lead->id}}>OFF</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="delete_btn2" data-route="{{route('lead_category_delete',$lead->id)}}"><i class=" fas fa-trash text-danger" aria-hidden="true" style="font-size:20px;cursor:pointer;margin-left: 5px;" data-toggle="modal" data-target="#exampleModal"></i></a>
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
          <form method="post" id="delete_form2"> 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
