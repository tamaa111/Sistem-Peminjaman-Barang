<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <link rel="icon" href="{{ asset('logoLending.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex gap-4 items-center">
        <div class="w-full p-4" style="height: 100vh;">
            <img src="{{ asset('lending.png') }}" alt="Photo"
                style="width: 100%; height: 100%; object-fit: cover; border-radius: 24px">
        </div>
        <div class="w-full flex justify-center max-h-screen">
            <div style="width: 50%">
                <img src="{{ asset('logoLending.png') }}" alt="Logo" style="width: 15%; object-fit: cover;"
                    class="mb-4 mx-auto">
                <h4 class="text-3xl text-center
                    font-semibold" style="margin-bottom: 32px">Selamat
                    Datang</h4>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
