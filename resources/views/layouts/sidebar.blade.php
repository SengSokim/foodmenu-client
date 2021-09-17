<div class="sidebar mt-2" style="width: 100%; overflow: hidden">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('portal/dashboard') ? 'active text-white' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('products') }}" class="nav-link {{ request()->is(['portal','portal/products*']) ? 'active text-danger' : '' }}">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            Products
          </p>
        </a>
      </li>    
      <li class="nav-item">
        <a href="{{ route('product-categories') }}" class="nav-link {{ request()->is('portal/product-categories') ? 'active text-danger' : '' }}">
          <i class="nav-icon fas fa-boxes"></i>
          <p>
            Product Categories
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users') }}" class="nav-link {{ request()->is('portal/users') ? 'active text-danger' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('tables') }}" class="nav-link {{ request()->is('portal/tables') ? 'active text-danger' : '' }}">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Tables
          </p>
        </a>
      </li>
    </ul>
  </nav>

  <div class="cus btn btn-danger btn-sm" style="position: fixed;bottom: 15px;font-weight: bold">Logout</div>
</div>
<style>
  .cus:hover {
    width: 234px
  }
</style>