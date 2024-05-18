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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- datatables --}}
    <script src="{{ asset('assets/js/jquery.dataTable.min.js') }}"></script>
    <link href="{{ asset('assets/css/dataTable.dataTable.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/datatable.css') }}" rel="stylesheet" />
    <link href='{{ asset('assets/images/sd-it-logo.png') }}' rel='website icon' type='png' />
</head>

<body class="font-sans">
    <div class="flex bg-gray-100 dark:bg-gray-900">
        <header class="flex-none hidden w-4/12 lg:w-1/6" id="hero-navbar">
            @include('layouts.navigation')
        </header>
        <div class="w-full min-h-screen overflow-x-auto">
            <div class="inline-block float-right mt-3 mr-3" id="content-btn-toggle">
                <button id="toggleButton">
                    <div
                        class="relative flex items-center justify-center rounded-full w-[30px] h-[30px] md:w-[40px] md:h-[40px] transform transition-all bg-slate-700 ring-0 ring-gray-300 hover:ring-8 group-focus:ring-4 ring-opacity-30 duration-200 shadow-md">
                        <div
                            class="flex flex-col justify-between w-[15px] h-[15px] transform transition-all duration-300 group-focus:-rotate-[45deg] origin-center">
                            <div
                                class="bg-white h-[2px] w-1/2 rounded transform transition-all duration-300 group-focus:-rotate-90 group-focus:h-[1px] origin-right delay-75 group-focus:-translate-y-[1px]">
                            </div>
                            <div class="bg-white h-[1px] rounded"></div>
                            <div
                                class="bg-white h-[2px] w-1/2 rounded self-end transform transition-all duration-300 group-focus:-rotate-90 group-focus:h-[1px] origin-left delay-75 group-focus:translate-y-[1px]">
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            @yield('container')

        </div>
    </div>


    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
