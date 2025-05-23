@props(['title' => 'Coders Free'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'laravel' }}</title>
    {{-- <title>{{ $title }}</title> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">

    @include('components.layouts.includes.app.header')
    <!-- Mobile Menu -->
    @include('components.layouts.includes.app.sidebar')
    
    <div class="[grid-area:main] p-6 lg:p-8 [[data-flux-container]_&]:px-0">
        {{ $slot }}
    </div>

    @include('components.layouts.includes.app.footer')

    @fluxScripts
</body>
</html>

