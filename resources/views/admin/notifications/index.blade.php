@extends('layouts.admin.app', [
    'class' => '',
    'elementActive' => ''
])

@section('content')
    <div class="content">
        <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h3 class="card-title">Notification</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Notifications List</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                <th scope="col">Type</th>
                                <th scope="col">data</th>
                                <th scope="col">Creation Date</th>
                            </tr></thead>
                            <tbody>
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{$notification->type}}</td>
                                        <td>{{$notification->data['message']}}</td>
                                        <td>{{$notification->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection