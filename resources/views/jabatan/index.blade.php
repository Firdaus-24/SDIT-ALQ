@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">JABATAN</h1>
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
            <h2 class="mb-2 text-sm font-bold lg:text-lg">Form Jabatan</h2>
            <div class="flex flex-col mb-3">
                <form action="{{ route('jabatan-add') }}" method="POST">
                    @csrf
                    <label for="nama" class="text-xs lg:text-sm">Nama</label>
                    <div class="flex">
                        <input type="text" class="w-5/6 text-xs rounded lg:text-sm" name="txtnama" id="txtnama"
                            value="{{ old('nama') }}" required autocomplete="off" maxlength="100">
                        <button type="submit"
                            class="w-1/6 ml-2 text-[12px] text-white rounded bg-sky-700 lg:text-sm">Save</button>
                        <button type="button" class="w-1/6 ml-2 text-[12px] text-white rounded bg-red-700 lg:text-sm"
                            onclick="window.location.href = '{{ route('jabatanImport') }}'">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="text-xs display lg:text-base" style="width:100%" id="tableJabatan">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">No</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Name</th>
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
            <button id="closeModal" class="absolute top-0 right-0 m-4 text-2xl" onclick="closeMdal()">&times;</button>

            <!-- Form -->
            <h5 class="mb-3 font-bold text-center uppercase">Update jabatan</h5>
            <form class="w-full max-w-lg" action="{{ route('jabatan-update') }}" method="post"
                onsubmit="return confirm('Are you sure to updated??')">
                @csrf
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase lg:text-sm"
                            for="nama">
                            Nama
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 text-xs leading-tight text-gray-700 bg-gray-200 border rounded appearance-none lg:text-sm focus:outline-none focus:bg-white"
                            id="update-id" type="hidden" name="txtid" autocomplete="off" autofocus required>
                        <input
                            class="block w-full px-4 py-3 mb-3 text-xs leading-tight text-gray-700 bg-gray-200 border rounded appearance-none lg:text-sm focus:outline-none focus:bg-white"
                            id="update-nama" type="text" name="txtnama" autocomplete="off" autofocus required>
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
            $('#tableJabatan').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                // scrollY: '410px',
                ajax: {
                    url: "{{ route('listJabatan') }}",
                },
                dom: 'lBfrtip', // Add the Buttons extension to the DataTable
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 ml-2 rounded '
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'
                    },
                ],
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

        const openModal = (id, name) => {
            $('#myModal').css("display", "flex");
            $('#update-id').val(id)
            $('#update-nama').val(name)
        }
        const closeMdal = () => {
            $('#myModal').css("display", "none");
        }

        const deleteJabatan = (id) => {
            if (confirm("Are you sure to deleted?") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        id
                    },
                    url: `{{ url('jabatanDelete') }}`,
                    dataType: 'json',
                    success: function(res) {
                        let oTable = $('#tableJabatan').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
