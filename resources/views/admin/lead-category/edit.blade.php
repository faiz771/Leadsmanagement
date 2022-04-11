@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
            <div class="card">
                    <h5 class="card-header">Edit Lead category</h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('leads.update',$lead->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="form-group ">
                                    <label for="inputText3" class="col-form-label">Name <span class="text-danger">*</span></label>
                                    <input name="name" value="{{$lead->name}}" type="text" class="form-control">
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <button type="submit"class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
