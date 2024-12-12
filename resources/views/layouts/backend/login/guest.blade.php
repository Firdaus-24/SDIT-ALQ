<!DOCTYPE html>
<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">

<head>
    {{-- <base href="../../../../"> --}}
    <title>{{ config('app.name', 'SDIT-Alquraniyyah') }}</title>
    <meta charset="utf-8" />
    <link href='{{ asset('assets/images/sd-it-logo.png') }}' rel='website icon' type='png' />
    <meta content="follow, index" name="robots" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="Sign in page using Tailwind CSS" name="description" />
    <meta content="@keenthemes" name="twitter:site" />
    <meta content="@keenthemes" name="twitter:creator" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="Metronic - Tailwind CSS Sign In" name="twitter:title" />
    <meta content="Sign in page using Tailwind CSS" name="twitter:description" />
    <meta content="en_US" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="@keenthemes" property="og:site_name" />
    <meta content="Metronic - Tailwind CSS Sign In" property="og:title" />
    <meta content="Sign in page using Tailwind CSS" property="og:description" />
    <meta content="/static/metronic-tailwind-html/dist/assets/media/app/og-image.png" property="og:image" />
    <link href="{{ asset('plugins/assets/media/app/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
    {{-- <link href="{{ asset('plugins/assets/media/app/favicon-32x32.png') }}" rel="icon" sizes="32x32"
        type="image/png" />
    <link href="{{ asset('plugins/assets/media/app/favicon-16x16.png') }}" rel="icon" sizes="16x16"
        type="image/png" /> --}}
    <link href="{{ asset('plugins/assets/media/app/favicon.ico') }}" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('plugins/assets/vendors/apexcharts/apexcharts.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/assets/vendors/keenicons/styles.bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="flex h-full dark:bg-coal-500">
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
    <!--begin::Page layout-->
    <style>
        .page-bg {
            background-image: url('plugins/assets/media/images/2600x1200/bg-10.png');
        }

        .dark .page-bg {
            background-image: url('plugins/assets/media/images/2600x1200/bg-10-dark.png');
        }
    </style>
    <div class="flex items-center justify-center bg-center bg-no-repeat grow page-bg">
        {{ $slot }}
    </div>
    <!--end::Page layout-->
    <!--begin::Page scripts-->
    <script src="{{ asset('plugins/assets/js/core.bundle.js') }}"></script>
    <script src="{{ asset('plugins/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!--end::Page scripts-->
</body>

</html>
