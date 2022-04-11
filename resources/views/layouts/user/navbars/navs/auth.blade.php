<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">{{ __('User Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(
                            Auth::user()->unreadNotifications->count() > 0
                        )
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        @endif
                        <i class="nc-icon nc-bell-55"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Notifications') }}</span>
                        </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        
                        $notifications = Auth::user()->unreadNotifications()->latest()->limit(5)->get();
                        
                        ?>
                        @foreach($notifications as $notification)
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __($notification->data['message']) }}</a>
                        </li>
                        @endforeach
                        <li class="nav-link">
                            <a href="{{route('usernotifications.index')}}" class="nav-item dropdown-item btn-sm">Read all</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="{{ route('userprofile.edit') }}">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
