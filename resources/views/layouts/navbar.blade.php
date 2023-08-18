<nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="btn btn-outline-success" data-target="#qr-code" data-toggle="modal"><i
                    class="fas fa-qrcode"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <img src="{{ $auth->user->image ?? url('img/no-image-user.png') }}"
                    class="user-image img-circle elevation-2" alt="User Image" title="User Profile">
                {{-- <span class="d-none d-md-inline"> {{ $auth->user->name  ?? 'Unknown' }}</span> --}}
            </a>

            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <li class="user-header bg-primary">
                    <img src="{{ $auth->user->image ?? url('img/no-image-user.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                    <p>{{ $auth->user->name ?? 'Unknown' }}</p>
                </li>
                <li class="user-footer">
                    {{-- <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a> --}}
                    <a href="{{ url('logout') }}" class="btn btn-default btn-flat float-right">
                        Sign Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
@include('layouts.qr-code')
