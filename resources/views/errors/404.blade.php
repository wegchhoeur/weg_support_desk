<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(isset($setting))
    <!-- App Title -->
    <title>Error 404 | {{ $setting->title }}</title>

    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}">
    <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}">
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keywords" content="{{ $setting->keywords }}">
    @endif

    @if(empty($setting))
    <!-- App Title -->
    <title>Error 404</title>
    @endif
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;#124;PT+Mono" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">

    <!-- Custom Style -->
    @if(isset($setting->custom_css))
    <style type="text/css">
        {!! strip_tags($setting->custom_css) !!}
    </style>
    @endif
  </head>
  <body class="loading">

    <div class="arcelia">
      <div class="page404">
        <div class="container wow fadeIn" data-wow-delay=".4s"><img src="{{ asset('/frontend/images/404.svg') }}" alt="">
          <h2>{{ __('pages.error_title') }}</h2>
          <div class="lead">{{ __('pages.error_subtitle') }}</div><a class="btn btn-white" href="{{ URL('/') }}">{{ __('pages.error_button') }}</a>
        </div>
      </div>
    </div>

    <!-- preloader-->
    <div class="preloader">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <!-- ./ preloader-->

    <!-- App scripts-->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <!-- ./ App scripts-->

  </body>
</html>