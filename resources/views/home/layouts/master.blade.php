@include('home.layouts.master_header')

<body >
    @yield('content')
    <footer>
        <div class="describe-container">
            <img class="footer-logo" src="{{ asset('images/amboja_logo.jpg') }}" alt="ambojaLogo">
            <p class="footer-text-describe">
                The easiest way to create a digital food menu for your restaurant, <br> bar or cafe.
            </p>
        </div>
        <div class="privacy-container">
            <div class="support-container">
                <i class="fa-regular fa-envelope"></i>
                support@1food.menu
            </div>
            <ul class="footer-menu">
                <li><a href="#">Blog</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
    </footer>
    <div class="bottom-footer-container">
        <div class="bottom-footer">
            @ 2023 - AMBOJA
        </div>
    </div>
    @include('home.layouts.master_footer')
