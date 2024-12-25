<div class="modal modal-open:!flex py-[5%]" data-modal="true" data-modal-disable-scroll="false" id="modal_profile">
    <div class="p-0 modal-content container-fixed" id="modal_profile_content">
        <div
            class="relative flex flex-col items-stretch justify-end p-0 bg-center bg-no-repeat bg-cover border-0 modal-header modal-rounded-t min-h-80 mb-7 modal-bg">
            <div
                class="flex flex-col justify-end border-b-0 grow px-9 bg-gradient-to-t from-light from-3% to-transparent">
                <button
                    class="absolute top-0 right-0 mt-5 mr-5 btn btn-sm btn-icon btn-light btn-outline lg:mr-10 shadow-default"
                    data-modal-dismiss="true">
                    <i class="ki-filled ki-cross">
                    </i>
                </button>
                <div class="flex justify-center mb-5">
                    <img class="rounded-full border-3 border-success max-h-[100px] overflow-hidden"
                        id="modal-profile-images" src="{{ $images ?? asset('assets/images/illustrations/blank.png') }}"
                        alt="avatar" />
                </div>
                <div class="grid items-center w-full gap-3 lg:grid-cols-3">
                    <div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-center gap-1.5 mb-2">
                            <h4 class="text-2xl font-semibold text-gray-800" id="modal-profile-nama">{{ $nama ?? '-' }}
                            </h4>
                        </div>
                        <div class="flex flex-wrap justify-center gap-1 text-sm lg:gap-3">
                            <div class="flex items-center gap-1">
                                <i class="text-base text-gray-500 ki-filled ki-sms">
                                </i>
                                <h5 class="text-gray-600 hover:text-primary" id="modal-profile-email">
                                    {{ $email ?? '-' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0 pl-6 pr-3 mb-5 mr-3 modal-body scrollable-y">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
                <div class="col-span-1">
                    <div class="grid gap-5 lg:gap-7.5">
                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Riwayat Organisasi
                                </h3>
                            </div>
                            <div class="card-body pb-7.5">
                                <div class="flex flex-wrap items-center gap-3 lg:gap-4">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary-clarity fill-primary-light"
                                            fill="none" height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                            <i class="ki-filled ki-abstract-39 text-1.5xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-brand-clarity fill-brand-light" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                            <i class="ki-filled ki-abstract-44 text-1.5xl ps-px text-brand">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-success-clarity fill-success-light"
                                            fill="none" height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                            <i class="ki-filled ki-abstract-25 text-1.5xl ps-px text-success">
                                            </i>
                                        </div>
                                    </div>
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-info-clarity fill-info-light" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4">
                                            <i class="ki-filled ki-delivery-24 text-1.5xl ps-px text-info">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tentang Guru
                                </h3>
                            </div>
                            <div class="pt-4 pb-3 card-body">
                                <table class="table-auto">
                                    <tbody>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Jenis Kelamin:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5" id="modal-profile-jk">
                                                {{ $jk ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Umur:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-umur">
                                                {{ $umur ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Jabatan:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-jabatan">
                                                {{ $jabatan ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Tempat Lahir:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-tempatlahir">
                                                {{ $tempat_lahir ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Tanggal Lahir:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-tgllahir">
                                                {{ $tanggal_lahir ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Jurusan:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-jurusan">
                                                {{ $jurusan ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Tahun Lulus:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-tahun">
                                                {{ $tahun_lulus ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Contact:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-contact">
                                                {{ $contact ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                NUPTK:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-nuptk">
                                                {{ $nuptk ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-medium text-gray-500 pb-3.5 pe-3">
                                                Status:
                                            </td>
                                            <td class="text-sm font-medium text-gray-800 pb-3.5"
                                                id="modal-profile-status">
                                                {{ $status ?? '' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex flex-col gap-5 lg:gap-7.5">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">
                            <div class="card">
                                <div class="gap-2 card-header">
                                    <h3 class="card-title">
                                        Kontribusi
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="flex flex-col gap-2 lg:gap-5">
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center grow gap-2.5">
                                                <img alt="" class="rounded-full size-9 shrink-0"
                                                    src="{{ asset('assets/images/illustrations/blank.png') }}" />
                                                <div class="flex flex-col">
                                                    <a class="mb-px text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Tyler Hero
                                                    </a>
                                                    <span class="text-xs font-medium text-gray-600">
                                                        6 connections
                                                    </span>
                                                </div>
                                            </div>
                                            <button class="rounded-full btn btn-xs btn-icon btn-primary btn-outline">
                                                <i class="ki-filled ki-plus">
                                                </i>
                                            </button>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center grow gap-2.5">
                                                <img alt="" class="rounded-full size-9 shrink-0"
                                                    src="{{ asset('assets/images/illustrations/blank.png') }}" />
                                                <div class="flex flex-col">
                                                    <a class="mb-px text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Esther Howard
                                                    </a>
                                                    <span class="text-xs font-medium text-gray-600">
                                                        29 connections
                                                    </span>
                                                </div>
                                            </div>
                                            <button
                                                class="rounded-full btn btn-xs btn-icon btn-primary btn-outline active">
                                                <i class="ki-filled ki-check">
                                                </i>
                                            </button>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center grow gap-2.5">
                                                <img alt="" class="rounded-full size-9 shrink-0"
                                                    src="{{ asset('assets/images/illustrations/blank.png') }}" />
                                                <div class="flex flex-col">
                                                    <a class="mb-px text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Cody Fisher
                                                    </a>
                                                    <span class="text-xs font-medium text-gray-600">
                                                        34 connections
                                                    </span>
                                                </div>
                                            </div>
                                            <button class="rounded-full btn btn-xs btn-icon btn-primary btn-outline">
                                                <i class="ki-filled ki-plus">
                                                </i>
                                            </button>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center grow gap-2.5">
                                                <img alt="" class="rounded-full size-9 shrink-0"
                                                    src="{{ asset('assets/images/illustrations/blank.png') }}" />
                                                <div class="flex flex-col">
                                                    <a class="mb-px text-sm font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Arlene McCoy
                                                    </a>
                                                    <span class="text-xs font-medium text-gray-600">
                                                        1 connections
                                                    </span>
                                                </div>
                                            </div>
                                            <button
                                                class="rounded-full btn btn-xs btn-icon btn-primary btn-outline active">
                                                <i class="ki-filled ki-check">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Assistance
                                    </h3>
                                </div>
                                <div class="flex items-center justify-center px-3 py-1 card-body">
                                    <div id="contributions_chart">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
