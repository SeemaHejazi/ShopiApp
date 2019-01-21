<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'ShopiApp')}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        @include('inc.header')

        <div class="container content-section">
            @yield('content')
        </div>

        <footer id="footer" class="text-center">
            <p>Copyright 2019 &copy; Seema Hejazi</p>
        </footer>

        @yield('scripts')
    </body>
</html>