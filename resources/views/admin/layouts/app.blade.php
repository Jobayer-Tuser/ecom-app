<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? config('app.name', 'E Commerce Admin') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset("assets/css/vendor.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset("assets/css/app.min.css") }}" rel="stylesheet"/>
    @stack('css')
</head>
<body>
<div id="app" class="app app-content-full-height">
    <div id="header" class="app-header">
        @include('admin.layouts.header')
    </div>

    <div id="sidebar" class="app-sidebar">
        @include('admin.layouts.sidebar')
    </div>

    <div id="content" class="app-content">
        {{ $slot }}
    </div>

    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    <div class="theme-panel">
        @include('admin.layouts.footer')
    </div>
</div>

<script src="{{ asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
<script src="{{ asset("assets/js/app.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("assets/dist/app.js")}}" type="text/javascript"></script>

<script src="{{asset('assets/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset("assets/plugins/apexcharts/dist/apexcharts.min.js")}}" type="text/javascript"></script>
@stack('script')
</body>
</html>
