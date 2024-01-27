<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Web Page</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{ asset('js/require.min.js') }}"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <!-- Dashboard Core -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <script src="{{ asset('plugins/charts-c3/plugin.js') }}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{ asset('plugins/maps-google/plugin.css') }}" rel="stylesheet" />
    <script src="{{ asset('plugins/maps-google/plugin.js') }}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ asset('plugins/input-mask/plugin.js') }}"></script>
    <script src="{{ asset('js/vendors/jquery-3.2.1.min.js')}}"></script>
    
    
</head>
<body class="">
    @if (Auth::user())
    <div class="page">
        <div class="page-main">
            @include('partials.header')
            @include('partials.menu')
            <div class="my-3 my-md-5">
                <div class="container">
                    @yield('navigation')
                    @if (count($errors) > 0)
                    <div class="alert alert-icon alert-danger" role="alert">
                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> 
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-icon alert-success" role="alert">
                        <i class="fe fe-check mr-2" aria-hidden="true"></i> {{session('success')}}
                    </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
    @else
    @yield('logueo')
    @endif
</body>
</html>