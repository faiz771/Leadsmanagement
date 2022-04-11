@extends('layouts.admin.app')

@section('content')
    <div class="content">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <h4>Wellcome {{ __(auth()->user()->name)}}</h4>       
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush