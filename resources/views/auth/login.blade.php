@extends('layouts.login.app')

@section('content')
<div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="javascript:void(0)"><h3>Leads Management System</h3></a><span class="splash-description">Please enter your information.</span> @if (Session::has('error'))
                <h6 class="text-danger">{{session::get('error')}}</h6>
            @endif</div>

            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    <div class="form-group">
                        @csrf
                        <input class="form-control form-control-lg" name="email" id="username" type="email" placeholder="email" autocomplete="off">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{url('forgot-password')}}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
