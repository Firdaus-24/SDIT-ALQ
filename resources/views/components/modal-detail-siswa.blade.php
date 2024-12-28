<div class="modal modal-open:!flex py-[5%]" data-modal="true" data-modal-disable-scroll="false" id="modal_detail_siswa">
    <div class="p-0 modal-content container-fixed" id="modal_detail_siswa_content">
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
                    <x-img-rounded id="modal-profile-siswa"></x-img-rounded>
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
                                <i class="text-base text-gray-500 ki-filled ki-tree">
                                </i>
                                <h5 class="text-gray-600 hover:text-primary" id="modal-detail-siswa-kelas">
                                    {{ $kelas ?? '-' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-0 pl-6 pr-3 mb-5 mr-3 modal-body scrollable-y">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
                <div class="col-span-1 lg:col-span-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex gap-2 py-1 lg:px-10">
                                <div class="grid flex-1">
                                    <div class="flex items-center gap-3 justify-self-center">
                                        <img alt="" class="h-10 max-w-full"
                                            src="{{ asset('plugins/assets/media/brand-logos/gamer-coin.svg') }}" />
                                        <div class="grid flex-1 grid-cols-1 place-content-center">
                                            <span class="text-gray-900 text-2xl lg:text-2.5xl font-semibold">
                                                {{ $poin ?? '0' }}
                                            </span>
                                            <span class="text-sm font-medium text-gray-600">
                                                Poin
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <span class="[&amp;:not(:last-child)]:border-r border-r-gray-300 my-1">
                                </span>
                                <div class="grid flex-1">
                                    <div class="flex items-center gap-3 justify-self-center">
                                        <img alt="" class="h-10 max-w-full"
                                            src="{{ asset('plugins/assets/media/brand-logos/gamer-diamond.svg') }}" />
                                        <div class="grid flex-1 grid-cols-1 place-content-center">
                                            <span class="text-gray-900 text-2xl lg:text-2.5xl font-semibold">
                                                {{ $prestasi ?? '0' }}
                                            </span>
                                            <span class="text-sm font-medium text-gray-600">
                                                Prestasi
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <span class="[&amp;:not(:last-child)]:border-r border-r-gray-300 my-1">
                                </span>
                                <div class="grid flex-1">
                                    <div class="flex items-center gap-3 justify-self-center">
                                        <img alt="" class="h-10 max-w-full"
                                            src="{{ asset('plugins/assets/media/brand-logos/gamer-trophy.svg') }}" />
                                        <div class="grid flex-1 grid-cols-1 place-content-center">
                                            <span class="text-gray-900 text-2xl lg:text-2.5xl font-semibold">
                                                {{ $tropi ?? '0' }}
                                            </span>
                                            <span class="text-sm font-medium text-gray-600">
                                                Tropi
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <span class="[&amp;:not(:last-child)]:border-r border-r-gray-300 my-1">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col gap-5 lg:gap-7.5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Eskull
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
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Aktifitas Siswa
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="flex flex-col">
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-people">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-800">
                                                    Absen
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    Today, 7:00 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-calendar-tick">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col pb-2.5">
                                                <span class="text-sm font-medium text-gray-700">
                                                    Masuk Kelas
                                                </span>
                                                <span class="text-xs font-medium text-gray-500">
                                                    07:45 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-entrance-left">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-800">
                                                    Pulang Sekolah
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    12:00 PM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex flex-col gap-5 lg:gap-7.5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Detail Siswa
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            NIS
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-nis">
                                            {{ $nis ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            NISN
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-nisn">
                                            {{ $nisn ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis Kelamin
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-jk">
                                            {{ $jk ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tempat lahir
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-tempat-lahir">
                                            {{ $tempat_lahir ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal lahir
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-tanggal-lahir">
                                            {{ $tanggal_lahir ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Rombel
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-rombel">
                                            {{ $rombel ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Agama
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-agama">
                                            {{ $agama ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Wali
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-wali">
                                            {{ $wali ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td id="modal-detail-siswa-status">
                                            {{ $status ?? '-' }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
