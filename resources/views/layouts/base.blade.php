<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-circle-link-health-secondary-color">
        <div class="font-sans text-gray-900 antialiased">
            <div class="max-w-5xl flex flex-col mx-auto px-10 pt-5 bg-white m-20">
                <div class="w-64 flex mx-auto justify-center my-10">
                    <img class="object-contain w-full" src="{{ asset('images/circleLink-health-trademark-logo.png') }}" alt="Circle Link Health">
                </div>
                @yield('content')
            </div>
        </div>     
        @livewireScripts
    </body>
</html>