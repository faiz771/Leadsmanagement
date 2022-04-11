<div class="wrapper">

    @include('layouts.user.navbars.auth')

    <div class="main-panel">
        @include('layouts.user.navbars.navs.auth')
        @yield('content')
    </div>
</div>