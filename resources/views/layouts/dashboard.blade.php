<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Buku Digital Nusantara') }}</title>

    <!-- Scripts -->
    @trixassets
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased m-0">
<div class="drawer lg:drawer-open">
    <input id="left-sidebar-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col">
        @include('layouts.dashboard-navbar')
        <main class="flex-1 h-screen overflow-y-auto md:pt-4 pt-4 px-6  bg-base-200">
            <div class="min-h-[calc(100vh-250px)]">
                {{ $slot }}
            </div>

            <div class="h-16"></div>
            <p class="text-sm text-center mb-4 mt-auto">
                Buku Digital Nusantara &copy;{{ date('Y') }} <span class="font-bold text-3xl mx-2">.</span> All Rights Reserved.
            </p>
        </main>
    </div>
    @include('layouts.dashboard-sidebar')
</div>

<script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
@stack('scripts')
</body>
</html>
