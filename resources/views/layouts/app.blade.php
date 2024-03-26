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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" />

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    --}}
    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    {{-- datatables --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/datatable.css') }}" rel="stylesheet" />

</head>

<body class="font-sans">
    <div class="flex bg-gray-100 dark:bg-gray-900 ">
        <header class="w-4/12 lg:w-1/6">
            @include('layouts.navigation')
        </header>
        <div class="w-8/12 lg:w-5/6 min-h-screen">
            @yield('container')
        </div>
    </div>

</body>

</html>
