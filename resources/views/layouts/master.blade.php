@php(getGeneralData($auth))
@include('layouts.master_header')
<body class="layout-fixed sidebar-mini layout-footer-fixed sidebar-collapse" style="height: 100vh; overflow: hidden">
  <div class="row">
    <div class="wrapper col-md-10 col-xs-sm" style="padding: 0">
      @include('layouts.navbar')

      <aside class="main-sidebar elevation-1 sidebar-light-warning">
        <a href="#" class="brand-link logo-switch">
          <img src="{{ asset('adminlte/dist/img/logo/emenu-black-transparent.png') }}" alt="Emenu Small" class="brand-image-xl logo-xs" style="height: 20px; margin: 9px 0px">
          <img src="{{ asset('adminlte/dist/img/logo/emenu-black-transparent.png') }}" alt="Emenu Large" class="brand-image-xs logo-xl" style="left: 85px">
        </a>
        @include('layouts.sidebar')
        <div class="sidebar-custom">
          <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
          <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
        </div>
      </aside>
      
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            @yield('content-header')             
          </div>
        </section>
        
        <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
      </div>

      <footer class="main-footer text-sm" >
        <div class="clearfix">
          <a href="#" class="btn btn-link btn-sm rounded-pill"><i class="fas fa-video"></i> Video Tutorials</a> | 
          <a href="#" class="btn btn-link btn-sm rounded-pill"><i class="fas fa-book"></i> Help Docs</a>
        </div>
      </footer>
    </div>
    <div class="col-md-2" id="responsive-qr" style="z-index: 1100;position: fixed; right: 0;background-color: #f8f9fa; border: 1px solid #dee2e6; ">
      <aside>
        @include('layouts.restaurant_sidebar')
      </aside>
    </div>
  </div>
</body>
@include('layouts.master_footer')
@include('layouts.alert')
  
