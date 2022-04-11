@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Add Project</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="inputText3" class="col-form-label">Select Developer<span class="text-danger">*</span></label>
                                    @php   
                                    $developers = App\Models\Developer::all();
                                    @endphp
                                    <select class="form-control" name="developer" id="developer_id" required>
                                    <option disabled selected>Select Your Developer</option>
                                    @foreach($developers as $developer)
                                    <option value="{{$developer->id}}">{{$developer->name}}</option>
                                     @endforeach                                        
                                      </select>
                                    @error('developer')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputText3" class="col-form-label">Project Name<span class="text-danger">*</span></label>
                                    <input type="text" name="project_name" class="form-control  @error('project_name') is-invalid @enderror" required>
                                    @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <label for="inputEmail">Contact Number  </label>
                                    <input id="contactNumber" name="contact" type="number" class="form-control" required>
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Project Picture</label>
                                    <input type="file" class="form-control-file @error('project_image') is-invalid @enderror" name="project_image" multiple
                                        aria-describedby="fileHelpId" >
                                    @error('project_image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Floor Plans</label>
                                    <input type="file" class="form-control-file @error('floor_plans') is-invalid @enderror" name="floor_plans" multiple id="floorPlan" placeholder=""
                                        aria-describedby="fileHelpId">
                                    @error('floor_plans')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Payment Plans </label>
                                    <input type="file" class="form-control-file @error('payment_plan') is-invalid @enderror" name="payment_plan" multiple placeholder=""
                                        aria-describedby="fileHelpId">
                                    @error('payment_plan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Booklet </label>
                                    <input type="file" class="form-control-file @error('booklet') is-invalid @enderror" multiple name="booklet" aria-describedby="fileHelpId">
                                    @error('booklet')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">About</label>
                                    <textarea class="form-control" name="about" rows="3"></textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputText3" class="col-form-label">Social Media</label>
                                    <input id="media" name="media"   type="text" class="form-control">
                                    @error('media')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pin Location </label>
                                <input type="text" name="location" required  class="form-control" placeholder=""
                                    aria-describedby="helpId">
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
