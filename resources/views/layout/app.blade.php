<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Docs -->
        <link href="http://getbootstrap.com/docs-assets/css/docs.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">  
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-admin-theme.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-admin-theme-change-size.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/highcharts.css')}}">
        <script src="{{ asset('public/js/jquery.3.3.1.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min') }}"></script>
        <script async defer src="{{asset('public/js/buttons.js')}}"></script>
    </head>
    <body>
        @include('includes.header')
        <div class="container">
        <div class="row"> 
        @yield('content')
        </div>
        </div>
        @include('includes.footer')
        <script src="{{ asset('public/js/highcharts') }}"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
    </body>
</html>
