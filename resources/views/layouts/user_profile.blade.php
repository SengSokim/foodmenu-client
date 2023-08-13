
<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
      <img src="{{ $auth->user->image ?? url('img/no-image-user.png') }}" class="user-image img-circle elevation-2" alt="User Image" title="User Profile">
      {{-- <span class="d-none d-md-inline"> {{ $auth->user->name  ?? 'Unknown' }}</span> --}}
    </a>

    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
      <li class="user-header bg-primary">
        <img src="{{ $auth->user->image  ?? url('img/no-image-user.png') }}" class="img-circle elevation-2" alt="User Image">
        <p>{{ $auth->user->name ?? 'Unknown'}}</p>
      </li>
      <li class="user-footer">
        <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
        <a href="{{ url('logout') }}"  class="btn btn-default btn-flat float-right">
            Sign Out
        </a>
      </li>
    </ul>
</li>
