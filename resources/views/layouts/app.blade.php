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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('/assets/css/crop/crop.css') }}">
    @livewireStyles
    @stack('styles')

    <style>
        .cropper-view-box,
        .cropper-face {
        border-radius: 50%;
        }

        /* The css styles for `outline` do not follow `border-radius` on iOS/Safari (#979). */
        .cropper-view-box {
            outline: 0;
            box-shadow: 0 0 0 1px white;
        }
    </style>
</head>

<body class=" max-h-screen " >

    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>



    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/custom-function.js') }}"></script>
    <script src="{{ asset('/assets/js/crop/crop.js') }}"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>
