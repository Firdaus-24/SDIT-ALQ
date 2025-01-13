@extends('layouts.backend.dashboard.app')


@section('container')
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
                            <img alt="" class="w-10 mt-4 ms-5" src="{{ asset('assets/images/guru-icon.png') }}" />
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
                            <img alt="" class="w-10 mt-4 ms-5" src="{{ asset('assets/images/alumni-icon.png') }}" />
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
                                <h2 class="text-1.5xl font-semibold text-gray-700">
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
                                Selengkapnya
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
                                Statistik
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
        </div>
    </div>
    <!-- end: container -->
@endsection
