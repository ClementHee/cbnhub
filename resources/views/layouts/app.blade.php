<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CBN Hub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Nunito&family=Quicksand&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ url('assets/js/plugins/chartjs.min.js') }}" async></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>
    <script src="{{ url('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>
    <script src="https://cdn.jsdelivr.net/npm/supertokens-auth-react"></script>

    <!-- In app.blade.php -->

  

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-blue-100">
        <livewire:layout.navigation />

        <!-- Page Content -->
        <main
            class="mt-10 relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl hide-scrollbar">
            {{ $slot }}
        </main>
    </div>



    @livewireScripts

    @stack('video-scripts')
</body>

</html>
