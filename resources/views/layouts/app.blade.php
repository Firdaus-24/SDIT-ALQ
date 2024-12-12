<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SDIT-Alquraniyyah') }}</title>
    {{-- begin ahead --}}
    @include('include.backend.partials.ahead')
    {{-- end ahead --}}

</head>

<body class="flex h-full demo1 sidebar-fixed header-fixed bg-[#fefefe] dark:bg-coal-500">
    <!--begin::Theme mode setup on page load-->
    <script>
        const defaultThemeMode = 'light'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('theme')) {
                themeMode = localStorage.getItem('theme');
            } else if (document.documentElement.hasAttribute('data-theme-mode')) {
                themeMode = document.documentElement.getAttribute('data-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <div class="flex grow">
        {{-- side --}}
        @include('include.backend.partials.aside')
        {{-- end side --}}
        <div class="flex flex-col wrapper grow">
            {{-- header --}}
            @include('include.backend.partials.header')
            {{-- end header --}}
            {{-- content --}}
            @yield('container')
            {{-- end content --}}
        </div>
    </div>
    <!--end::Theme mode setup on page load-->
    @include('include.backend.partials.script')
</body>

</html>
