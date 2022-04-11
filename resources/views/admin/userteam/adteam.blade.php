@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Add User Team</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                    <form method="POST" action="{{route('userteam.store')}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                        
                                <div class="form-group col-md-6">
                                <label for="inputText4" class="col-form-label">Team name :</label>
                                <input type="text" id="name" class="form-control" name="name" value="">
                                </div>

                                <div class="form-group col-md-6">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">List of Users :</label>
                                    <select class="form-control"  multiple name="user_id[]" id="getCountryId">
                                    @php   
                                    $users = App\Models\User::all();
                                    @endphp
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach()
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

