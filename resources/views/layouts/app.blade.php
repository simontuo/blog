<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{--<script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>--}}

    {{--logo--}}
    <link rel="shortcut icon" href="http://photo.maguas.com/logo.png" type="image/x-icon"/>

    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts._header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts._footer')

        @if(session()->has('noty'))
            <noty type="{{ session('noty')['type'] }}" message="{{ session('noty')['message'] }}"></noty>
        @endif
    </div>
</body>
</html>
