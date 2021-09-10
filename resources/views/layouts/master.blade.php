@include('layouts.master_header')
<style>
  .content-wrapper {
    height: 80vh; 
    overflow-y: auto;
  }
</style>
<body class="layout-fixed sidebar-mini layout-footer-fixed sidebar-collapse" style="height: 100vh; overflow: hidden">
  <div class="row">
    <div class="wrapper col-md-10 col-xs-12" style="padding: 0">
      @include('layouts.navbar')

      <aside class="main-sidebar elevation-1 sidebar-light-warning">
        <a href="#" class="brand-link logo-switch">
          <img src="{{ asset('adminlte/dist/img/logo/emenu-black-transparent.png') }}" alt="Emenu Small" class="brand-image-xl logo-xs" style="height: 20px; margin: 9px 0px">
          <img src="{{ asset('adminlte/dist/img/logo/emenu-black-transparent.png') }}" alt="Emenu Large" class="brand-image-xs logo-xl" style="left: 85px">
        </a>
        @include('layouts.sidebar')
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
          <a href="#" class="btn btn-warning btn-sm rounded-pill"><i class="fas fa-video"></i> Video Tutorials</a>
          <a href="#" class="btn btn-warning btn-sm rounded-pill"><i class="fas fa-book"></i> Help Docs</a>
        </div>
      </footer>
    </div>
    <div class="col-md-2" style="z-index: 1100;position: fixed; right: 0;background-color: #f8f9fa; border: 1px solid #dee2e6; ">
      <aside>
        @include('layouts.restaurant_sidebar')
      </aside>
    </div>
  </div>
  @include('layouts.master_footer')
</body>
