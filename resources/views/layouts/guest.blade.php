<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CHEDRO9 | DTS</title>

        <link rel="icon" href="{{asset('img/ched_logo.svg')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans antialiased">
            {{-- <style>
                .cover {
                    min-height: 100vh; /* Full viewport height */
                    background-image: url('{{asset("assets/img/Chedoverlay.png")}}');
                    background-position: center;
                    background-size: cover;
                    background-blend-mode: overlay;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: relative;
                }
            </style> --}}
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
