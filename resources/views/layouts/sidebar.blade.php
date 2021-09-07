<div class="sidebar mt-2">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('portal/dasboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('products') }}" class="nav-link {{ request()->is(['portal','portal/products*']) ? 'active' : '' }}">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            Product
          </p>
        </a>
      </li>    
      <li class="nav-item">
        <a href="{{ route('product-categories') }}" class="nav-link {{ request()->is('portal/product-categories') ? 'active' : '' }}">
          <i class="nav-icon fas fa-boxes"></i>
          <p>
            Product Category
          </p>
        </a>
      </li>
      <li style="position: fixed; bottom: 15px;">
        <a href="#" class="btn btn-default btn-sm">Logout</a>
      </li>
    </ul>
  </nav>
</div>
