<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login — {{ config('app.name', 'TechNews Portal') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-canvas font-sans antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center px-4">
            <a href="{{ route('home') }}" class="mb-8 font-display text-3xl text-ink">
                Tech<span class="text-primary">News</span>
            </a>
            <div class="w-full max-w-md rounded-card border border-hairline bg-white p-8 shadow-sm">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
