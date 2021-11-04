<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>eMenu</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg-with-no-stroke.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.css') }}">   
    <!--bootstrap-->
    <link rel="stylesheet" href="">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- lity -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/lity/lity.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Jquery toast -->
    <link rel="stylesheet" href="{{ asset('loading/jquery.loading.css') }}">
    <link rel="stylesheet" href="{{ asset('toast/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('confirm/jquery-confirm.min.css') }}">
    <!-- croppie -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/croppie-2.6.4/croppie.css') }}">
    
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
      .content-wrapper {
        height: 80vh; 
        overflow-y: auto;
      }

      
      #my-profile:hover{
          background-color: #fff;
      }

      @media (max-width: 768px) { 
        #responsive-qr {
          display: none;
        }

        #margin-filter{
          margin: 0 2rem
        }

        #margin-product{
          margin: 1rem 2rem
          
        }
      }


      .dropdown-toggle::after {
          display:none;
      }
      div ul li{
        list-style-type: none;
      }

      .res-name{
      font-weight: bold;
        margin: 8px 0 8px 0;
        text-align: center
      }

      .res-qrcode{
        margin: 20px 10px
      }

      .card-body{
        padding: 0.5rem !important;
      }

      .scan-for-menu{
        text-align: center;
        margin-top: -10px
      }

      .poweredby{
        text-align: center;
        position: fixed;
        bottom: 10px
      }
    </style>

    @yield('header-content')
      
  </head>