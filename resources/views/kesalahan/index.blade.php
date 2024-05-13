@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">MASTER KESALAHAN SISWA</h1>
        @if (session('msg'))
            <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Success</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @error('txtnama')
            <div class="px-4 py-3 mb-3 text-red-900 bg-red-100 border-t-4 border-red-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Error</p>
                        <p class="text-xs lg:text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @enderror
        <div class="w-full p-4 mb-3 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-sm font-bold lg:text-lg">Form Kesalahan Siswa</h2>
            <form action="{{ route('kesalahan-add') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-5">
                    <div class="flex flex-col col-span-2">
                        <label for="txtname" class="text-xs lg:text-sm">Nama</label>
                        <input type="text" class="text-xs rounded lg:text-sm" name="txtname" id="txtname"
                            value="{{ old('txtname') }}" required autocomplete="off" maxlength="200">
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label for="txtscore" class="text-xs lg:text-sm">Score</label>
                        <input type="number" class="text-xs rounded lg:text-sm" name="txtscore" id="txtscore"
                            value="{{ old('txtscore') }}" required autocomplete="off">
                    </div>
                    <div class="flex items-end">
                        <button
                            class="content-center h-10 min-w-full text-xs text-white rounded bg-sky-700 lg:text-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="text-xs display lg:text-base" style="width:100%" id="tableKesalahan">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">No</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Name</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Score</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Create at</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Update at</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Is active</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full">
        <!-- Overlay hitam untuk latar belakang modal -->
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>

        <!-- Konten Modal -->
        <div class="z-50 w-2/3 p-6 bg-white rounded-lg lg:w-1/3">
            <!-- Tombol untuk menutup modal -->
            <button id="closeModal" class="absolute top-0 right-0 m-4 text-2xl"
                onclick="closeMdalKesalahan()">&times;</button>

            <!-- Form -->
            <h5 class="mb-3 font-bold text-center uppercase">Update Master Kesalahan</h5>
            <form class="w-full max-w-lg" action="{{ route('kesalahan-update') }}" method="post"
                onsubmit="return confirm('Anda yakin untuk update data??')">
                @csrf
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        {{-- name --}}
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase lg:text-sm"
                            for="updateTxtname">
                            Nama
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 text-xs leading-tight text-gray-700 bg-gray-200 border rounded appearance-none lg:text-sm focus:outline-none focus:bg-white"
                            id="update-id" type="hidden" name="txtid" autocomplete="off" required>
                        <input
                            class="block w-full px-4 py-3 mb-3 text-xs leading-tight text-gray-700 bg-gray-200 border rounded appearance-none lg:text-sm focus:outline-none focus:bg-white"
                            id="update-txtname" type="text" name="updateTxtname" autocomplete="off" autofocus required>
                        {{-- score --}}
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase lg:text-sm"
                            for="updateTxtscore">
                            Score
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 text-xs leading-tight text-gray-700 bg-gray-200 border rounded appearance-none lg:text-sm focus:outline-none focus:bg-white"
                            id="update-txtscore" type="number" name="updateTxtscore" autocomplete="off" autofocus required>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-700 lg:text-sm focus:outline-none focus:shadow-outline"
                        type="submit">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            $('#tableKesalahan').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                ajax: {
                    url: "{{ route('listkesalahan') }}",
                },
                dom: 'lBfrtip', // Add the Buttons extension to the DataTable
                // buttons: [{
                //         extend: 'excelHtml5',
                //         className: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 ml-2 rounded '
                //     },
                //     {
                //         extend: 'csvHtml5',
                //         className: 'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'
                //     },
                //     {
                //         extend: 'pdfHtml5',
                //         className: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'
                //     },
                // ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'score',
                        name: 'score'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false
                    }
                ]
            });


        });

        const openModalKesalahan = (id, name, score) => {
            $('#myModal').css("display", "flex");
            $('#update-id').val(id)
            $('#update-txtname').val(name)
            $('#update-txtscore').val(score)
        }
        const closeMdalKesalahan = () => {
            $('#myModal').css("display", "none");
        }

        const deleteKesalahan = (id) => {
            if (confirm("Anda yakin untuk menonaktifkan?") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        id
                    },
                    url: `{{ url('kesalahanDelete') }}`,
                    dataType: 'json',
                    success: function(res) {
                        let oTable = $('#tableKesalahan').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
