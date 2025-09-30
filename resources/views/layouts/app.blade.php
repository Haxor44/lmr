<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MatFam Resort') }} - @yield('title', 'Experience Luxury Redefined')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Main Styles -->
    @include('layouts.partials.styles')
    
    @stack('styles')
</head>
<body class="antialiased">
    <!-- Navigation -->
    @include('layouts.partials.navigation')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Floating Concierge -->
    @include('layouts.partials.concierge')

    <!-- Main Scripts -->
    @include('layouts.partials.scripts')
    
    @stack('scripts')
</body>
</html>
