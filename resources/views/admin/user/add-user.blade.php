@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">

                <div class="card">
                    <h5 class="card-header">Add User</h5>
                    <div id="msg"></div>
                    <div class="card-body">
                        <form action="{{route('add-users.store')}}" method="POST">
                            <div class="row">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label for="inputText3" class="col-form-label">User Name <span class="text-danger">*</span></label>
                                    <input id="name" type="text" name="user_name" class="form-control">
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Contact Number <span class="text-danger">*</span></label>
                                    <input type="number" name="contact" class="form-control">
                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Email<span class="text-danger">*</span></label>
                                    <input id="email" type="email" name="email" class="form-control">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <label for="inputEmail">Whatsapp Number <span class="text-danger">*</span></label>
                                    <input type="number" name="whatsapp" class="form-control">
                                    @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="inputEmail">Password <span class="text-danger">*</span></label>
                                    <input id="password" type="password" name="password" class="form-control">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- <div class="form-group col-md-6">
                                  <label for="">Role</label>
                                  <select class="form-control" name="role" id="">
                                    <option selected disabled >Select Role</option>
                                    <option value="1">admin</option>
                                    <option value="2">user</option>
                                  </select>
                                </div> -->
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.add_more', function() {

            html = `<div class="row">
                    <div class="form-group col-md-5">
                    <label for="inputText3" class="col-form-label">Links</label>
                    <input id="addlinks" name="addlinks[]" type="text" class="form-control">
                    </div><div class="form-group col-md-5">
                    <label for="inputText3" class="col-form-label">Social Media</label>
                    <input id="media" type="text" name="media[]"  class="form-control"></div>
                    <div class="form-group col-md-2">
                    <button type="button" class="btn btn-danger remove_option" style="margin-top: 28px;">Remove</button>
                    </div></div>`;

            $('#links').append(html);
        });

        $(document).on('click', '.remove_option', function() {
            $(this).closest('.row').remove();
        })

        function city() {
            $('#getCityId').html('')
            id = $('#getCountryId').find(":selected").val();
            $.ajax({
                type: "get",
                url: "{{ url('admin/get-city') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    // console.log(response)
                    if (response.status == 'success') {
                        $.each(response.city, function(index, value) {
                            html = '<option value="' + value.id + '">' + value.city + '</option>';
                            $('#getCityId').append(html);
                        });

                    } else {
                        alert(response.msg)
                    }

                }
            });

        }

        function add() {
            $('#errorName').text('');
            $('#errorContact').text('');
            $('#errorPassword').text('');
            $('#errorWhatsapp').text('');
            $('#errorEmail').text('');

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/add-user') }}",
                data: $('#addDev').serialize(),
                success: function(response) {
                    console.log(response)
                    if (response.msg == 'success') {
                        $('#msg').html(' <div class="alert alert-success alert-dismissible m-3">User Added Successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>')
                         $('#addDev').trigger("reset");

                    }else{
                        $('#errorName').text(response.vali.name);
                        $('#errorContact').text(response.vali.contact);
                        $('#errorPassword').text(response.vali.password);
                        $('#errorWhatsapp').text(response.vali.whatsapp);
                        $('#errorEmail').text(response.vali.email);
                 }
                }
            });
        }
    </script>
@endsection
