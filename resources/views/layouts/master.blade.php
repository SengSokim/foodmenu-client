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
      </aside>
      
      <div class="content-wrapper" id="content-wrapper">
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
          <a href="https://www.youtube.com/watch?v=Q742xYQAKnM" target="_blank" class="btn btn-link btn-sm rounded-pill" style="color: #1aa7ec"><i class="fas fa-video"></i> {{ __('app.footer.video-tutorials') }}</a> | 
          <a href="#" class="btn btn-link btn-sm rounded-pill" style="color: #1aa7ec"><i class="fas fa-book"></i> {{ __('app.footer.help-docs') }}</a>
        </div>
      </footer>
    </div>
    <div class="col-md-2" id="responsive-qr" style="z-index: 1100;position: fixed; right: 0;background-color: #f8f9fa; border: 1px solid #dee2e6; ">
      <div>
        <aside>
          @include('layouts.restaurant_sidebar')
        </aside>
      </div>
    </div>
  </div>
</body>
@include('layouts.master_footer')
@include('layouts.alert')