<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased h-screen">
        @include('layouts.navigation')
        <div class="flex justify-center items-center min-h-screen text-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 dark:text-white">
            <div>
                <img src="{{ asset('storage/R.png') }}" alt="ngeng" width="500px">
                <h1 class="text-6xl font-bold mb-4">Rental Mobil</h1>
                <p class="text-2xl mb-4">Solusi transportasi terpercaya</p>
                <p>
                    @if (auth()->user())
                        <a href="/list" class="dark:text-white font-bold">Cari Mobil</a>
                    @else
                        <a href="/login" class="dark:text-white font-bold">Sign-In</a>
                    @endif
                </p>
            </div>
        </div>
    </body>
</html>
