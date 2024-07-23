<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Job Portal') }}</title>

        <link href="{{asset("assets/css/vendor.min.css")}}" rel="stylesheet" />
        <link href="{{asset("assets/css/app.min.css")}}" rel="stylesheet" />
    </head>
<body>
    <div id="app" class="app app-full-height app-without-header">
        {{ $slot }}
    </div>

    <script src="{{asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/app.min.js")}}" type="text/javascript"></script>
</body>
</html>
