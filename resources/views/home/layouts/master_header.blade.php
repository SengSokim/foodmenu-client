<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="application-name" content="AMBOJA" />
    <title> @yield('title', 'AMBOJA') </title>
    <meta name="apple-mobile-web-app-title" content="AMBOJA" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="apple-touch-icon" href="https://papadeliver.co/img/logo%20-%20blue.png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo.jpg') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Adminlte -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- croppie -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/croppie-2.6.4/croppie.css') }}">
    <!--  Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
    <!--  BS-Stepper  -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!--  Lity  -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/lity-2.4.1/dist/lity.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-doc.css') }}">
    <!-- DataTable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/docs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/confirm/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/loading/jquery.loading.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/toast/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ mix('dist/js/axios.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">
    <link rel="Shortcut icon" href="{{ asset('images/amboja_logo.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- flickity -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> -->
    
    @yield('header-content')
    @yield('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source Sans Pro&family=Metal&display=swap');

        .wrapper {
            font-family: 'Source Sans Pro', 'Metal';
        }

        #company_name:hover {
            color: lightskyblue !important
        }

        @media print {
            .noprint {
                visibility: hidden;
            }
        }

        .menu-is-opening>a.nav-link>p>svg {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        :root {
            --primary: #007bff;
            --orange: #ff7e00;
            --light-purple: #B565A7;
            --blue-lzis: #5B5EA6;
            --marigold: #FDAC53;
            --french-blue: #0072B5;
            --mint: #00A170;
            --willow: #9A8B4F;
            --apen-gold: #FFD662;
            --light-grey: #ced4da;
        }
        @media screen {
            #printSection {
                display: none;
            }
        }
        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
            .btn {
                display: none;
            }
            button {
                display:none;
            }
        }
    </style>
</head>
