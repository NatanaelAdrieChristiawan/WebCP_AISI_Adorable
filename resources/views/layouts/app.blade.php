<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'PT Aisi Aiken Indonesia — Solusi proteksi kebakaran terpercaya. Distributor dan kontraktor sistem fire protection, fire alarm, dan suppression system.')">

    <title>@yield('title', 'PT Aisi Aiken Indonesia — Fire Protection Solutions')</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('image/logo/logo.png') }}">

    {{-- Google Fonts: Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine x-cloak --}}
    <style>[x-cloak] { display: none !important; }</style>

    @yield('head')
    @stack('head')
</head>
<body class="bg-white text-text-dark antialiased">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @yield('scripts')
    @stack('scripts')

</body>
</html>
