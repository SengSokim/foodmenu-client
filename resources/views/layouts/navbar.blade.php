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
        <li class="user-footer">
            <a href="{{ url('logout') }}" class="btn btn-default btn-flat float-right;">
                Sign Out
            </a>
        </li>

    </ul>

</nav>

@include('layouts.qr-code')

