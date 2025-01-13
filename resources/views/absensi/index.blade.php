@extends('layouts.backend.dashboard.app')

@push('css')
    <style>
        .entry-callout-bg {
            background-image: url('assets/images/guru_anak.png');
        }

        .dark .entry-callout-bg {
            background-image: url('assets/images/guru_anak.png');
        }

        #cameraStream {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 0.5rem;
        }

        #photoCard {
            align-items: center;
            height: 100%;
            width: 100%;
        }
    </style>
@endpush
@section('container')
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-xl font-semibold leading-none text-gray-700">
                    Absensi
                </h1>
            </div>
        </div>
    </div>

    <div class="container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-1">
                    <div
                        class="h-full p-6 shadow-2xl card bg-gradient-to-br from-gray-800 via-gray-700 to-gray-900 rounded-xl">
                        <div class="grid grid-rows-2 gap-6 card-body">
                            <!-- Digital Clock -->
                            <div id="digital-clock"
                                class="flex items-center justify-center h-32 px-8 py-4 text-6xl font-light tracking-widest text-gray-100 rounded-lg shadow-lg lg:text-4xl ring-4 ring-offset-4 ring-blue-500 ring-opacity-60 animate-pulse">
                                12:45 PM
                            </div>
                            <!-- Date -->
                            <div id="date"
                                class="flex items-center justify-center px-8 py-2 text-xl font-semibold tracking-wider text-white">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="lg:col-span-2">
                    <div class="h-96 card" id="card-container">
                        <div class="hidden photoCard" id="photoCard"></div>
                        <div
                            class="card-body bg-[length:85%] bg-center bg-no-repeat bg-indigo-600 bg-opacity-25 m-5 entry-callout-bg h-full cursor-pointer card-absensi">
                            <div class="flex flex-col justify-center gap-4">
                                <h2 class="text-1.5xl font-semibold text-gray-700">
                                    <b>ABSEN DISINI</b>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-3 camera-controller btn-group button-camera" style="display: none">
                        <button class="btn btn-icon btn-outline btn-primary" id="capturePhoto">
                            <i class="ki-filled ki-abstract-33"></i>
                        </button>
                        <button class="btn btn-icon btn-outline btn-danger" id="closeCamera">
                            <i class="ki-filled ki-abstract-11"></i>
                        </button>
                    </div>
                    <div class="hidden">
                        <form action="{{ route('absen-guru.store') }}" method="POST" enctype="multipart/form-data"
                            id="photoForm">
                            @csrf
                            <input type="hidden" name="photo" id="photo">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="latitude" id="latitude">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid mt-4">
            <div class="min-w-full card card-grid">
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="table-absensi">
                            <thead>
                                <tr>
                                    <th class="w-[30px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                No
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Tanggal
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Nama
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Jam Masuk
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Lokasi Masuk
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Jam Keluar
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Lokasi Pulang
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Foto
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal id="modalAbsen" modalSize="medium" modalTitle="Absen">
        <div class="w-full contenFoto">
        </div>
    </x-modal>

    @push('js')
        <script>
            $(document).ready(function() {
                let photoCard = $('#photoCard');
                $('#card-container').on('click', async function() {
                    try {
                        const mediaStream = await navigator.mediaDevices.getUserMedia({
                            video: true
                        });
                        $(".card-absensi").hide();
                        $(".photoCard").show();
                        $(".button-camera").show();

                        photoCard.html(`
                            <div class="flex items-center justify-center w-full h-full p-5">
                                <video id="cameraStream" autoplay playsinline class="w-full h-full rounded-lg"></video>
                            </div>
                        `);

                        const video = document.getElementById('cameraStream');
                        video.srcObject = mediaStream;

                        $('#capturePhoto').on('click', function() {
                            // Ambil foto dari video
                            const canvas = document.createElement('canvas');
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            const context = canvas.getContext('2d');
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const photoData = canvas.toDataURL('image/png');

                            // Isi input hidden dengan data foto
                            $('#photo').val(photoData);

                            // Ambil lokasi menggunakan Geolocation API
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(
                                    function(position) {
                                        const latitude = position.coords.latitude;
                                        const longitude = position.coords.longitude;
                                        const accuracy = position.coords
                                            .accuracy; // Akurasi dalam meter

                                        console.log('Lokasi ditemukan dengan akurasi: ' +
                                            accuracy + ' meter');

                                        if (accuracy >
                                            100) { // Jika akurasi lebih dari 100 meter
                                            ERROR_ALERT(
                                                'Lokasi kurang akurat. Mohon aktifkan GPS atau pindah ke area terbuka.'
                                            );
                                            return;
                                        }

                                        // Isi input hidden dengan koordinat lokasi
                                        $('#latitude').val(latitude);
                                        $('#longitude').val(longitude);

                                        // Kirim data ke server melalui AJAX
                                        const formData = $('#photoForm').serialize();
                                        $.ajax({
                                            url: $('#photoForm').attr('action'),
                                            method: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                SUCCESS_ALERT(response.message);
                                                $('#table-absensi').DataTable().ajax
                                                    .reload();
                                                resetCamera();
                                            },
                                            error: function(xhr) {
                                                ERROR_ALERT(xhr.responseJSON
                                                    .message);
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    },
                                    function(error) {
                                        ERROR_ALERT('Lokasi tidak dapat diakses: ' + error
                                            .message);
                                    }, {
                                        enableHighAccuracy: true,
                                        timeout: 10000,
                                        maximumAge: 0
                                    }
                                );
                            } else {
                                ERROR_ALERT('Geolocation tidak didukung di browser ini.');
                            }
                        });

                        $('#closeCamera').on('click', function() {
                            resetCamera();
                        });

                        function resetCamera() {
                            const mediaStream = video.srcObject;
                            const tracks = mediaStream.getTracks();
                            tracks.forEach(track => track.stop());
                            $(".photoCard").hide();
                            $(".button-camera").hide();
                            $('.card-absensi').show();
                        }
                    } catch (error) {
                        alert('Kamera tidak dapat diakses: ' + error.message);
                    }
                });

                $('#table-absensi').DataTable({
                    dom: '<"top"f>rt<"bottom"ip><"clear">',
                    processing: true,
                    serverSide: true,
                    paging: true,
                    responsive: true,
                    searching: false,
                    ajax: {
                        url: "{!! route('absen-guru.list') !!}",
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jam_masuk',
                            name: 'Jam Masuk',
                        },
                        {
                            data: 'lokasi_masuk',
                            name: 'Lokasi Masuk',
                            className: 'text-center',
                            orderable: false,
                        },
                        {
                            data: 'jam_keluar',
                            name: 'Jam Keluar',
                        },
                        {
                            data: 'lokasi_pulang',
                            name: 'Lokasi Pulang',
                            className: 'text-center',
                            orderable: false,
                        },
                        {
                            name: 'foto',
                            data: 'foto',
                            className: 'text-center',
                            orderable: false,
                        }
                    ]
                });
                $('.dataTables_filter').addClass('mb-4');
            });

            function openFotoAbsen(imageMasuk, imagePulang) {
                // Mengatur konten gambar di dalam modal
                $('.contenFoto').html(`
                        <div class="grid grid-cols-2 gap-4 flex justify-center max-h-[25rem] overflow-hidden mb-5">
                            <div class="mb-4">
                                <h3 class="mb-3 text-lg font-semibold text-center">Foto Masuk</h3>
                                <img src="${imageMasuk}" alt="Foto Masuk" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3 text-lg font-semibold text-center">Foto Pulang</h3>
                                <img src="${imagePulang}" alt="Foto Pulang" class="w-full h-auto rounded-lg">
                            </div>
                        </div>
                    `);
            }

            function updateClock() {
                const now = new Date();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');

                // Format hari dan tanggal
                const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                const day = days[now.getDay()];
                const date = now.getDate().toString().padStart(2, '0');
                const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
                const year = now.getFullYear();

                // Menampilkan hari dan tanggal
                document.getElementById('date').textContent = `${day}, ${date}/${month}/${year}`;

                document.getElementById('digital-clock').textContent = `${hours}:${minutes}:${seconds}`;
            }

            setInterval(updateClock, 1000);
            updateClock(); // Initial call to set time immediately
        </script>
    @endpush
@endsection
