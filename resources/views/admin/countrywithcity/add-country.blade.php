@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Add Country With City</h5>
                    <div class="card-body">
                            <form action="{{route('country.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Country</label>
                                    <input id="country" type="text" name="country" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Area</label>
                                    <input type="text" name="area" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
