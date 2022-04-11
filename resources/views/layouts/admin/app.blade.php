<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">

    {{-- <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/inputmask/css/inputmask.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>



    
    <title>Admin Dashboard</title>
</head>

<body style="font-family: auto;">
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="javascript:void(0)">Leads</a>
                <div class="collapse navbar-collapse ">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="javascript:void(0)" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{asset('assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        {{ __(auth()->user()->name)}}</h5>
                                </div>
                                <a class="dropdown-item" href="{{ url('logout') }}"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{ url('#') }}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ url('/home') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fa fa-fw fa-rocket"></i>Developer</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('developers.create')}}">Add
                                                Developer <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('developers.index')}}">Developer
                                                List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-chart-pie"></i>Country</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('country.create')}}">Add
                                                Country <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('country.index')}}">
                                                Country List</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-4" aria-controls="submenu-4"><i
                                        class="fas fa-fw fa-chart-pie"></i>Project</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('projects.create')}}">Add
                                                Project <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('projects.index')}}">
                                                Project List</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-5" aria-controls="submenu-5"><i
                                        class="fas fa-fw fa-chart-pie"></i>Lead Settings </a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('leads.index') }}">Lead Category List<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('lead-person-list') }}">
                                                Lead Person List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('lead-source-list')}}">
                                                Lead Source</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('lead-status-list') }}">
                                                Lead Status List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-6" aria-controls="submenu-6"><i
                                        class="fas fa-fw fa-chart-pie"></i>User</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('add-users.create')}}">Add User<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('add-users.index')}}">
                                                User List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-6" aria-controls="submenu-6"><i
                                        class="fas fa-fw fa-chart-pie"></i>User</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/admin/add-user') }}">Add User<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/admin/user') }}">
                                                User List</a>
                                        </li>

                                    </ul>
                                </div>
                            </li> -->

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-7" aria-controls="submenu-7"><i
                                        class="fas fa-fw fa-chart-pie"></i>User Team</a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('userteam.index')}}">User Team List<span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-8" aria-controls="submenu-8"><i
                                        class="fas fa-fw fa-chart-pie"></i>Leads Query</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('queries.create')}}">Add Query<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('queries.index')}}">Query List<span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-9" aria-controls="submenu-9"><i
                                        class="fas fa-fw fa-chart-pie"></i>Lead</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('assignlead.create')}}">Assign Lead<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/reassign_projectcreate')}}">Assign Project<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('assignlead.index')}}">Lead List<span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <script src="{{ asset('assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ asset('assets/libs/js/dashboard-ecommerce.js') }}"></script>

    <script src="{{ asset('assets/vendor/inputmask/js/jquery.inputmask.bundle.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>






    @yield('script')
    <script>
        $(document).on('click','.delete_btn4',function () {
            var url = $(this).attr('data-route');

                $("#delete_form4").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn5',function () {
            var url = $(this).attr('data-route');

                $("#delete_form5").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn6',function () {
            var url = $(this).attr('data-route');

                $("#delete_form6").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn_user_team',function () {
            var url = $(this).attr('data-route');

                $("#delete_form_user_team").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })
        
        $(document).on('click','.delete_btn2',function () {
            var url = $(this).attr('data-route');

                $("#delete_form2").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn3',function () {
            var url = $(this).attr('data-route');

                $("#delete_form3").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn_source',function () {
            var url = $(this).attr('data-route');

                $("#lead_source_form").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.delete_btn_status',function () {
            var url = $(this).attr('data-route');

                $("#lead_status_form").attr('action',url);

            $('#conform_delete_modal').modal('show');
        })

        $(document).on('click','.status',function(){

let status = $(this).attr('data-id');

$.ajax({
    url: '{{ url('change-status') }}/'+status,
    type : 'POST',
    dataType : 'json',
    data : {status : status , _token: '{{csrf_token()}}' },
    success:function(response){

        location.reload();
    }

});
})

        $(document).on('click','.leadstatus',function(){

let status = $(this).attr('data-id');

$.ajax({
    url: '{{ url('status-change-status') }}/'+status,
    type : 'POST',
    dataType : 'json',
    data : {status : status , _token: '{{csrf_token()}}' },
    success:function(response){

        location.reload();

        }
});
})

$(document).on('click','.leadsource',function(){

let sourcestatus = $(this).attr('data-id');

$.ajax({
    url: '{{ url('source-change-status') }}/'+sourcestatus,
    type : 'POST',
    dataType : 'json',
    data : {sourcestatus : sourcestatus , _token: '{{csrf_token()}}' },
    success:function(response){

        location.reload();

    }

});
})

$(document).on('click','.personstatus',function(){

    let personstatus = $(this).attr('data-id');

    $.ajax({
        url: '{{ url('person-change-status') }}/'+personstatus,
        type : 'POST',
        dataType : 'json',
        data : {personstatus : personstatus , _token: '{{csrf_token()}}' },
        success:function(response){

            location.reload();

        }

    });
})

$(document).ready( function () {
            $('#mytable').DataTable();
 });
    </script>

</body>

</html>
