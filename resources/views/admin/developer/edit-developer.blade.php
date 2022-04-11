@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Edit Developer</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('developers.update',$developer->id)}}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">Developer Name <span class="text-danger">*</span></label>
                                    <input name="developerName" value="{{$developer->name}}"  type="text" class="form-control">
                                </div>
                                @error('developerName')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Contact Number  </label>
                                    <input name="contactNumber" value="{{$developer->contact}}" type="number" class="form-control">
                                @error('contactNumber')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">Country</label>
                                    <select class="form-control" value="{{$developer->country_id}}" name="country">
                                        <option disabled selected>Select Your Country</option>
                                    </select>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText4" class="col-form-label">City</label>
                                    <select class="form-control" value="{{$developer->city_id}}" name="city">
                                        <option disabled selected>Select Your city</option>
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Logo</label>
                                    <input type="file" class="form-control-file" name="logo" id="logo" placeholder=""
                                        aria-describedby="fileHelpId">
                                    <small id="fileHelpId" class="form-text text-muted">Help text</small>
                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Booklet </label>
                                    <input type="file" class="form-control-file" multiple name="booklet" id="booklet" aria-describedby="fileHelpId">
                                    <small id="fileHelpId" class="form-text text-muted">Help text</small>
                                    @error('booklet')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">About</label>
                                    <textarea class="form-control"  name="about" id="about" rows="3">{{$developer->about}}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputText3" class="col-form-label">Social Media</label>
                                    <input id="media" value="{{$developer->social_media}}" name="media" type="text" class="form-control">
                                    @error('media')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pin Location </label>
                                <input type="text" name="location" value="{{$developer->location}}" id="location" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Help text</small>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                               </div>
                            <button type="submit"class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
