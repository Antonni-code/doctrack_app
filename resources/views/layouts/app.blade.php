<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark_mode') === 'true' }"
      x-init="$watch('darkMode', value => localStorage.setItem('dark_mode', value))"
      :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CHEDRO9 | DTS</title>

        <link rel="icon" href="{{asset('img/ched_logo.svg')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        {{-- theme toggle script --}}
        {{-- <script src="{{ asset('js/theme-toggle.js') }}" defer></script> --}}


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme-toggle.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class=" mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>

        <!-- from node_modules -->
        <script async src="node_modules/@material-tailwind/html/scripts/ripple.js"></script>

        <!-- from cdn -->
        <script async src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
