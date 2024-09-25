@extends('layouts.backend.dashboard.app')


@section('container')
    <main class="pt-5 grow content" id="content" role="content">
        <!-- begin: container -->
        <div class="container-fixed" id="content_container">
        </div>
        <!-- end: container -->
        <!-- begin: container -->
        <div class="container-fixed">
            <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                <div class="flex flex-col justify-center gap-2">
                    <h1 class="text-xl font-semibold leading-none text-gray-900">
                        Dashboard
                    </h1>
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
                        Menegement Informasi SDIT Al-Qur'aniyyah
                    </div>
                </div>
            </div>
        </div>
        <!-- end: container -->
        <!-- begin: container -->
        <div class="container-fixed">
            <div class="grid gap-5 lg:gap-7.5">
                <!-- begin: grid -->
                <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
                    <div class="lg:col-span-1">
                        <div class="grid grid-cols-2 gap-5 lg:gap-7.5 h-full items-stretch">
                            <style>
                                .channel-stats-bg {
                                    background-image: url('plugins/assets/media/images/2600x1600/bg-3.png');
                                }

                                .dark .channel-stats-bg {
                                    background-image: url('plugins/assets/media/images/2600x1600/bg-3-dark.png');
                                }
                            </style>
                            <div
                                class="card flex-col justify-between gap-6 h-full bg-cover bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                <img alt="" class="w-10 mt-4 ms-5"
                                    src="{{ asset('assets/images/guru-icon.png') }}" />
                                <div class="flex flex-col gap-1 px-5 pb-4">
                                    <span class="text-3xl font-semibold text-gray-900">
                                        {{ $teacher }}
                                    </span>
                                    <span class="font-medium text-gray-600 text-2sm ">
                                        Total Guru Aktif
                                    </span>
                                </div>
                            </div>
                            <div
                                class="card flex-col justify-between gap-6 h-full bg-cover bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                <img alt="" class="w-10 mt-4 ms-5"
                                    src="{{ asset('assets/images/alumni-icon.png') }}" />
                                <div class="flex flex-col gap-1 px-5 pb-4">
                                    <span class="text-3xl font-semibold text-gray-900">
                                        {{ $alumni }}
                                    </span>
                                    <span class="font-medium text-gray-600 text-2sm ">
                                        Total Alumni
                                    </span>
                                </div>
                            </div>
                            <div
                                class="card flex-col justify-between gap-6 h-full bg-cover bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                <img alt="" class="w-10 mt-4 ms-5"
                                    src="{{ asset('assets/images/murid-perempuan-icon.png') }}" />
                                <div class="flex flex-col gap-1 px-5 pb-4">
                                    <span class="text-3xl font-semibold text-gray-900">
                                        {{ $studentPerempuan }}
                                    </span>
                                    <span class="font-medium text-gray-600 text-2sm ">
                                        Murid Perempuan
                                    </span>
                                </div>
                            </div>
                            <div
                                class="card flex-col justify-between gap-6 h-full bg-cover bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                <img alt="" class="w-10 mt-4 ms-5"
                                    src="{{ asset('assets/images/murid-laki-icon.png') }}" />
                                <div class="flex flex-col gap-1 px-5 pb-4">
                                    <span class="text-3xl font-semibold text-gray-900">
                                        {{ $studentLaki }}
                                    </span>
                                    <span class="font-medium text-gray-600 text-2sm ">
                                        Murid Laki - Laki
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <style>
                            .entry-callout-bg {
                                background-image: url('assets/images/vision-board-icon.png');
                            }

                            .dark .entry-callout-bg {
                                background-image: url('assets/images/vision-board-icon.png');
                            }
                        </style>
                        <div class="h-full card">
                            <div
                                class="card-body p-10 bg-[length:80%] [background-position:175%_25%] bg-no-repeat entry-callout-bg">
                                <div class="flex flex-col justify-center gap-4">
                                    <h2 class="text-1.5xl font-semibold text-gray-900">
                                        Visi Misi
                                        <br />
                                        <b>SDIT AL-Qur'aniyyah</b>
                                    </h2>
                                    <p class="text-sm font-medium text-gray-700 leading-5.5">
                                        Enhance your projects with premium themes and
                                        <br />
                                        templates. Join the KeenThemes community today
                                        <br />
                                        for top-quality designs and resources.
                                    </p>
                                </div>
                            </div>
                            <div class="justify-center card-footer">
                                <a class="btn btn-link" href="#">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: grid -->
                <!-- begin: grid -->
                <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                    <div class="lg:col-span-1">
                        <div class="h-full card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Highlights
                                </h3>
                                {{-- <div class="menu" data-menu="true">
                                    <div class="menu-item" data-menu-item-offset="0, 10px"
                                        data-menu-item-placement="bottom-end" data-menu-item-toggle="dropdown"
                                        data-menu-item-trigger="click|lg:click">
                                        <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                            <i class="ki-filled ki-dots-vertical">
                                            </i>
                                        </button>
                                        <div class="menu-dropdown menu-default w-full max-w-[200px]"
                                            data-menu-dismiss="true">
                                            <div class="menu-item">
                                                <a class="menu-link" href="html/demo1/account/activity.html">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-cloud-change">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Activity
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" data-modal-toggle="#share_profile_modal"
                                                    href="#">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-share">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Share
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-item" data-menu-item-offset="-15px, 0"
                                                data-menu-item-placement="right-start" data-menu-item-toggle="dropdown"
                                                data-menu-item-trigger="click|lg:hover">
                                                <div class="menu-link">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-notification-status">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Notifications
                                                    </span>
                                                    <span class="menu-arrow">
                                                        <i class="ki-filled ki-right text-3xs">
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="menu-dropdown menu-default w-full max-w-[175px]">
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/account/home/settings-sidebar.html">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-sms">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title">
                                                                Email
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/account/home/settings-sidebar.html">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-message-notify">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title">
                                                                SMS
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/account/home/settings-sidebar.html">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-notification-status">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title">
                                                                Push
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" data-modal-toggle="#report_user_modal"
                                                    href="#">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-dislike">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Report
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-separator">
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link"
                                                    href="html/demo1/account/home/settings-enterprise.html">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-setting-3">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Settings
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body flex flex-col gap-4 p-5 lg:p-7.5 lg:pt-4">
                                <div class="flex flex-col gap-0.5">
                                    <span class="text-sm font-medium text-gray-600">
                                        Kinerja Sekolah
                                    </span>
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-3xl font-semibold text-gray-900">
                                            295.7k
                                        </span>
                                        <span class="badge badge-outline badge-success badge-sm">
                                            +2.7%
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1 mb-1.5">
                                    <div class="bg-success h-2 w-full max-w-[60%] rounded-sm">
                                    </div>
                                    <div class="bg-brand h-2 w-full max-w-[25%] rounded-sm">
                                    </div>
                                    <div class="bg-info h-2 w-full max-w-[15%] rounded-sm">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center gap-4 mb-1">
                                    <div class="flex items-center gap-1.5">
                                        <span class="badge badge-dot size-2 badge-success">
                                        </span>
                                        <span class="text-sm font-medium text-gray-700">
                                            Penerimaan
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="badge badge-dot size-2 badge-danger">
                                        </span>
                                        <span class="text-sm font-medium text-gray-700">
                                            Keluar
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="badge badge-dot size-2 badge-info">
                                        </span>
                                        <span class="text-sm font-medium text-gray-700">
                                            Dipecat
                                        </span>
                                    </div>
                                </div>
                                <div class="border-b border-gray-300">
                                </div>
                                <div class="grid gap-3">
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center gap-1.5">
                                            <i class="text-base text-gray-500 ki-filled ki-shop">
                                            </i>
                                            <span class="text-sm font-medium text-gray-800">
                                                Penerimaan siswa
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-6 text-sm font-medium text-gray-800">
                                            <span class="lg:text-right">
                                                172k
                                            </span>
                                            <span class="lg:text-right">
                                                <i class="ki-filled ki-arrow-up text-success">
                                                </i>
                                                3.9%
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center gap-1.5">
                                            <i class="text-base text-gray-500 ki-filled ki-facebook">
                                            </i>
                                            <span class="text-sm font-medium text-gray-800">
                                                Siswa Keluar
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-6 text-sm font-medium text-gray-800">
                                            <span class="lg:text-right">
                                                85k
                                            </span>
                                            <span class="lg:text-right">
                                                <i class="ki-filled ki-arrow-down text-danger">
                                                </i>
                                                0.7%
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center gap-1.5">
                                            <i class="text-base text-gray-500 ki-filled ki-instagram">
                                            </i>
                                            <span class="text-sm font-medium text-gray-800">
                                                Siswa dipecat
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-6 text-sm font-medium text-gray-800">
                                            <span class="lg:text-right">
                                                36k
                                            </span>
                                            <span class="lg:text-right">
                                                <i class="ki-filled ki-arrow-up text-success">
                                                </i>
                                                8.2%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <div class="h-full card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Earnings
                                </h3>
                                <div class="flex gap-5">
                                    <label class="switch switch-sm">
                                        <input class="order-2" name="check" type="checkbox" value="1" />
                                        <span class="order-1 switch-label">
                                            Presentase
                                        </span>
                                    </label>
                                    <select class="select select-sm w-28" name="select">
                                        <option value="1">
                                            1 bulan
                                        </option>
                                        <option value="2">
                                            3 bulan
                                        </option>
                                        <option value="3">
                                            6 bulan
                                        </option>
                                        <option selected="" value="4">
                                            12 bulan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col items-stretch justify-end px-3 py-1 card-body grow">
                                <div id="earnings_chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: grid -->
                <!-- begin: grid table-->
                <div class="grid lg:grid-cols-12 gap-5 lg:gap-7.5 items-stretch">
                    <div class="lg:col-span-2">
                        <div class="grid">
                            <div class="w-full h-full card card-grid">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Teams
                                    </h3>
                                    <div class="input input-sm max-w-48">
                                        <i class="ki-filled ki-magnifier">
                                        </i>
                                        <input placeholder="Search Teams" type="text" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div data-datatable="true" data-datatable-page-size="5">
                                        <div class="scrollable-x-auto">
                                            <table class="table table-border" data-datatable-table="true">
                                                <thead>
                                                    <tr>
                                                        <th class="w-[60px]">
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-check="true" type="checkbox" />
                                                        </th>
                                                        <th class="w-[280px]">
                                                            <span class="sort asc">
                                                                <span class="sort-label">
                                                                    Team
                                                                </span>
                                                                <span class="sort-icon">
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="min-w-[135px]">
                                                            <span class="sort">
                                                                <span class="sort-label">
                                                                    Rating
                                                                </span>
                                                                <span class="sort-icon">
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="min-w-[135px]">
                                                            <span class="sort">
                                                                <span class="sort-label">
                                                                    Last Modified
                                                                </span>
                                                                <span class="sort-icon">
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="min-w-[135px]">
                                                            <span class="sort">
                                                                <span class="sort-label">
                                                                    Members
                                                                </span>
                                                                <span class="sort-icon">
                                                                </span>
                                                            </span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="1" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Product Management
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Product development &amp; lifecycle
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            21 Oct, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-success-inverse ring-success-light bg-success">
                                                                        +10
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="2" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Marketing Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Campaigns &amp; market analysis
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label indeterminate">
                                                                    <i class="text-base leading-none rating-on ki-solid ki-star"
                                                                        style="width: 50.0%">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            15 Oct, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] uppercase text-warning-inverse ring-warning-light bg-warning">
                                                                        g
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="3" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    HR Department
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Talent acquisition, employee welfare
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            10 Oct, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-info-inverse ring-info-light bg-info">
                                                                        +A
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="4" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Sales Division
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Customer relations, sales strategy
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            05 Oct, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="5" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Development Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Software development
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label indeterminate">
                                                                    <i class="text-base leading-none rating-on ki-solid ki-star"
                                                                        style="width: 50.0%">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            01 Oct, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-danger-inverse ring-danger-light bg-danger">
                                                                        +5
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="6" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Quality Assurance
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Product testing
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            25 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="7" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Finance Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Financial planning
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            20 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-primary-inverse ring-primary-light bg-primary">
                                                                        +8
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="8" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Customer Support
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Customer service
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label indeterminate">
                                                                    <i class="text-base leading-none rating-on ki-solid ki-star"
                                                                        style="width: 50.0%">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            15 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="9" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    R&amp;D Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Research &amp; development
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            10 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="10" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Operations Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Operations management
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            05 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="11" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    IT Support
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Technical support
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            01 Sep, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="12" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Legal Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Legal support
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            25 Aug, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="13" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Logistics Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Supply chain
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label indeterminate">
                                                                    <i class="text-base leading-none rating-on ki-solid ki-star"
                                                                        style="width: 50.0%">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            20 Aug, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="14" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Procurement Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Supplier management
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            15 Aug, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <span
                                                                        class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-info-inverse ring-info-light bg-info">
                                                                        +3
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox checkbox-sm"
                                                                data-datatable-row-check="true" type="checkbox"
                                                                value="15" />
                                                        </td>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="text-sm font-semibold leading-none text-gray-900 hover:text-primary"
                                                                    href="#">
                                                                    Training Team
                                                                </a>
                                                                <span class="leading-3 text-gray-600 text-2sm">
                                                                    Employee training
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="rating">
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label checked">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i
                                                                        class="text-base leading-none rating-on ki-solid ki-star">
                                                                    </i>
                                                                    <i
                                                                        class="text-base leading-none rating-off ki-outline ki-star">
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            10 Aug, 2024
                                                        </td>
                                                        <td>
                                                            <div class="flex -space-x-2">
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                                <div class="flex">
                                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                        src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div
                                            class="flex-col justify-center gap-5 font-medium text-gray-600 card-footer md:justify-between md:flex-row text-2sm">
                                            <div class="flex items-center order-2 gap-2 md:order-1">
                                                Show
                                                <select class="w-16 select select-sm" data-datatable-size="true"
                                                    name="perpage">
                                                </select>
                                                per page
                                            </div>
                                            <div class="flex items-center order-1 gap-4 md:order-2">
                                                <span data-datatable-info="true">
                                                </span>
                                                <div class="pagination" data-datatable-pagination="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: grid -->
            </div>
        </div>
        <!-- end: container -->
    </main>
@endsection
