<div class="sidebar mt-2" style="width: 100%; overflow: hidden">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item" id="responsive" onclick="showInfo()"> 
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            {{ __('app.sidebar.restaurant') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('*admin/dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            {{ __('app.sidebar.dashboard') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('products') }}" class="nav-link {{ request()->is(['*admin','*admin/products*','*admin/product_variants*']) ? 'active' : '' }}">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            {{ __('app.sidebar.products') }}
          </p>
        </a>
      </li>    
      <li class="nav-item">
        <a href="{{ route('product-categories') }}" class="nav-link {{ request()->is('*admin/product-categories') ? 'active' : '' }}">
          <i class="nav-icon fas fa-boxes"></i>
          <p>
            {{ __('app.sidebar.categories') }}
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('orders.index')}}" class="nav-link {{ request()->is('*admin/orders') ? 'active' : '' }}">
          <i class="nav-icon fas fa-box"></i>
          <p>
            {{ __('app.sidebar.orders') }}
          </p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="{{route('users')}}" class="nav-link {{ request()->is('*admin/users') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li> --}}
      <li class="nav-item">
        <a href="{{route('tables')}}" class="nav-link {{ request()->is('*admin/tables') ? 'active' : '' }}">
          <i class="nav-icon fas fa-table"></i>
          <p>
            {{ __('app.sidebar.tables') }}
          </p>
        </a>
      </li>

   
      <li class="nav-item">
        <a href="{{ route('setting.telegram') }}" class="nav-link {{ request()->is('*admin/setting*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            {{ __('app.sidebar.settings') }}
          </p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="{{ route('users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('tables') }}" class="nav-link {{ request()->is('admin/tables') ? 'active' : '' }}">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Tables
          </p>
        </a>
      </li> --}}    
      {{-- <li class="nav-item"> 
        <div class="card" style="height: 10rem;background-color: #f4cf83">
          <div class="card-body">
            <div class="card m-1">
              <div class="card-body m-1 text-dark">
                <h4 class="text-center">Premium Plan</h4>
                <hr>
                - Lorem ipsom lorem ipsom<br>
                - Lorem ipsom lorem ipsom<br>
              </div>
            </div>
          </div>
        </div>
      </li>  --}}
    </ul>
  </nav>
</div>
