<div class="sidebar mt-2" style="width: 100%; overflow: hidden">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('portal/dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('products') }}" class="nav-link {{ request()->is(['portal','portal/products*','portal/product_variants*']) ? 'active' : '' }}">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            Products
          </p>
        </a>
      </li>    
      <li class="nav-item">
        <a href="{{ route('product-categories') }}" class="nav-link {{ request()->is('portal/product-categories') ? 'active' : '' }}">
          <i class="nav-icon fas fa-boxes"></i>
          <p>
            Categories
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('setting.telegram') }}" class="nav-link {{ request()->is('portal/setting*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Setting
          </p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="{{ route('users') }}" class="nav-link {{ request()->is('portal/users') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('tables') }}" class="nav-link {{ request()->is('portal/tables') ? 'active' : '' }}">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Tables
          </p>
        </a>
      </li> --}}    
      <li class="nav-item"> 
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
      </li> 
    </ul>
  </nav>
</div>
