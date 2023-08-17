@include('home.layouts.master_header')

<body >
    @yield('content')
    <footer>
        <div class="describe-container">
            <img class="footer-logo" src="{{ asset('images/amboja_logo.jpg') }}" alt="ambojaLogo">
            <p class="footer-text-describe">
                The easiest way to create a digital food menu for your restaurant, bar or cafe.
            </p>
        </div>
        <div class="privacy-container">
            <div class="support-container">
                <i class="fa-regular fa-envelope"></i>
                AMBOJA.com
            </div>
        </div>
    </footer>
    <div class="bottom-footer-container">
        <div class="bottom-footer">
            @ 2023 - AMBOJA
        </div>
    </div>
    @include('home.layouts.master_footer')
