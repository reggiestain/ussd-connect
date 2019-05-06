<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap-->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">  
        <link rel="stylesheet" href="{{URL::asset('css/jquery.dataTables.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-admin-theme.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-admin-theme-change-size.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/highcharts.css')}}">
        <script src="{{URL::asset('js/jquery.js') }}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{URL::asset('js/jquery.dataTables.js') }}"></script>
        
        <script src="{{URL::asset('js/moment.min.js') }}"></script>
    </head>
    <body>
        @include('includes.header')
        <div class="container">
        <div class="row"> 
        @yield('content')
        </div>
        </div>
        @include('includes.footer')
        
        <!--<script src="http://code.highcharts.com/highcharts-more.js"></script>-->
    </body>
</html>
