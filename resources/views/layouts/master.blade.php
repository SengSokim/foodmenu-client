@include('layouts.master_header')
@yield('style')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
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

        <footer class="main-footer no-print">
            <strong>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> AMING Holding Company.
            </strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('layouts.master_footer')
    @include('layouts.alert')
