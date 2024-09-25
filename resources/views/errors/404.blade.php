<!DOCTYPE html>
<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">

<head>
    <base href="../../../">
    <title>
        Metronic - Tailwind CSS Error 404
    </title>
    @include('include.backend.partials.ahead')
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
    <!--begin::Page layout-->
    <div class="flex grow">
        {{-- <div class="flex flex-col wrapper grow"> --}}
        <main class="pt-5 grow content" id="content" role="content">
            <!-- begin: container -->
            <div class="container-fixed" id="content_container">
            </div>
            <!-- end: container -->
            <div class="flex flex-col items-center justify-center h-[95%]">
                <div class="mb-10">
                    <img alt="image" class="max-h-[200px]"
                        src="{{ asset('assets/images/illustrations/404-error-lost.png') }}" />
                </div>
                <span class="mb-3 badge badge-primary badge-outline">
                    404 Error
                </span>
                <h3 class="text-2.5xl font-semibold text-gray-900 text-center mb-2">
                    We have lost this page
                </h3>
                <div class="mb-10 font-medium text-center text-gray-600 text-md">
                    The requested page is missing. Check the URL or
                    <a class="font-medium text-primary hover:text-primary-active" href="{{ route('dashboard') }}">
                        Return Home
                    </a>
                    .
                </div>
            </div>
        </main>
        {{-- </div> --}}
    </div>

    <!--end::Page layout-->
    <!--begin::Page scripts-->
    @include('include.backend.partials.script')
    <!--end::Page scripts-->
</body>

</html>
