<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img data-lity src="{{ asset('assets/images/logo.jpg') }}"
                style="min-height: 50px; max-height: 50px; width: 50px;" class="elevation-2" alt="User Profile">
        </div>
        <div class="pull-left info mt-2">
            <h5 class="text-light" id="company_name">AMBOJA</h5>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- | DASHBOARD
            |-------------------------------------------------------------------------- --}}
            @if (checkPermission($auth->user->permissions, 'dashboard-read'))
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endif
            @if (checkPermission($auth->user->permissions, 'category-read'))
                <li class="nav-item">
                    <a href="{{ route('categories') }}"
                        class="nav-link {{ request()->is('*admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Categories</p>
                    </a>
                </li>
            @endif
            @if (checkPermission($auth->user->permissions, 'product-read'))
                <li class="nav-item">
                    <a href="{{ route('products') }}"
                        class="nav-link {{ request()->is('*admin/products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>Products</p>
                    </a>
                </li>
            @endif
            {{-- | ORDERS
            |-------------------------------------------------------------------------- --}}
            @if (checkPermission($auth->user->permissions, 'orders-read'))
                <li class="nav-item">
                    <a href="{{ route('orders') }}"
                        class="nav-link {{ request()->is('*admin/orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Orders</p>
                    </a>
                </li>
            @endif
            {{-- | AUTHENTICATION
            |-------------------------------------------------------------------------- --}}
            @if (checkPermissionOr($auth->user->permissions, ['user-read', 'role-read', 'log-read']))
                <li
                    class="nav-item has-treeview {{ $is_active_setting = request()->is('admin/users*', 'admin/roles*', 'admin/status_history') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $is_active_setting ? 'active' : '' }}  ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Authentications
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ $is_active_setting ? 'style="display: block;"' : '' }}>
                        @if (checkPermission($auth->user->permissions, 'user-read'))
                            <li class="nav-item">
                                <a href="{{ route('users') }}"
                                    class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        @endif

                        @if (checkPermission($auth->user->permissions, 'role-read'))
                            <li class="nav-item">
                                <a href="{{ route('roles') }}"
                                    class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

        </ul>
    </nav>
</div>
