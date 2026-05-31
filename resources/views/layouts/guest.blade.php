<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-200 antialiased bg-[#0A0A0A]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0A0A0A]/95 relative px-4">
            
            <!-- Logo / Brand text -->
            <div class="text-center space-y-2">
                <a href="/" class="font-luxury text-3xl font-bold tracking-widest text-gold-gradient uppercase">
                    ARAIA PROPERTY
                </a>
                <p class="text-xs text-gray-500 uppercase tracking-widest">CV Pintu Langit Araia</p>
            </div>

            <!-- Card wrapper -->
            <div class="w-full sm:max-w-md mt-8 px-8 py-8 glass-card border border-[#C9A84C]/25 bg-[#121212]/70 shadow-2xl overflow-hidden rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
