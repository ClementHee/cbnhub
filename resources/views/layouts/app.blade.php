<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CBN Hub') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
        
        <link href="{{url("assets/css/argon-dashboard-tailwind.css?v=1.0.1")}}" rel="stylesheet" />
        <!-- plugin for charts  -->
    <script src={{url("assets/js/plugins/chartjs.min.js")}} async></script>
    <!-- plugin for scrollbar  -->
    <script src={{url("assets/js/plugins/perfect-scrollbar.min.js")}} async></script>
    <!-- main script file  -->
    <script src={{url("assets/js/argon-dashboard-tailwind.js?v=1.0.1")}} async></script>
    <script src="https://cdn.jsdelivr.net/npm/supertokens-auth-react"></script>




    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Content -->
            <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
                {{ $slot }}
            </main>
        </div>

           @livewireScripts
    </body>
  

    
</html>
