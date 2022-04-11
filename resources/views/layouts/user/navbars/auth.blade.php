<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('img/logo.png') }}">
            </div>
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
            {{ __('User') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('user.dashboard', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('userprofile.edit', 'profile') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Setting') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
