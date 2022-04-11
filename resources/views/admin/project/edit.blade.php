@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="card">
                    <h5 class="card-header">Edit Project</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('projects.update',$project->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')    
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="inputText3" class="col-form-label">Select Developer<span class="text-danger">*</span></label>
                                    @php   
                                    $developers = App\Models\Developer::all();
                                    $develop = App\Models\Developer::where('id',$project->developer)->first();
                                    @endphp
                                    <select class="form-control" name="developer" id="developer_id">
                                    <option value="{{$develop->id}}" selected>{{$develop->name}}</option>
                                    @foreach($developers as $developer)
                                    @if($developer->id != $project->id)
                                    <option value="{{$developer->id}}">{{$developer->name}}</option>
                                    @endif
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
                                    <input type="text" name="project_name" class="form-control" value="{{$project->name}}">
                                    @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <label for="inputEmail">Contact Number  </label>
                                    <input id="contactNumber" name="contact" type="number" value="{{$project->contact}}" class="form-control">
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Project Picture</label>
                                    <input type="file" class="form-control-file" name="project_image" multiple
                                        aria-describedby="fileHelpId">
                                    @error('project_image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Floor Plans</label>
                                    <input type="file" class="form-control-file" name="floor_plans" multiple id="floorPlan" placeholder=""
                                        aria-describedby="fileHelpId">
                                    @error('floor_plans')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Payment Plans </label>
                                    <input type="file" class="form-control-file" name="payment_plan" multiple placeholder=""
                                        aria-describedby="fileHelpId">
                                    @error('payment_plan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Booklet </label>
                                    <input type="file" class="form-control-file" multiple name="booklet" aria-describedby="fileHelpId">
                                    @error('booklet')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">About</label>
                                    <textarea class="form-control" name="about" rows="3">{{$project->about}}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputText3" class="col-form-label">Social Media</label>
                                    <input id="media" name="media"   type="text" class="form-control" value="{{$project->socialmedia_links}}">
                                    @error('media')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pin Location </label>
                                <input type="text" name="location" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{$project->location}}">
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
