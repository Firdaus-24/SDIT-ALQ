@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3">JABATAN</h1>
        @if (session('msg'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-3 rounded-lg"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="font-bold text-sm lg:text-base">Success</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @error('txtnama')
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mb-3 rounded-lg"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="font-bold text-sm lg:text-base">Error</p>
                        <p class="text-xs lg:text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @enderror
        <div class="w-full bg-white p-4 shadow-md rounded-lg mb-3">
            <h2 class="text-sm lg:text-lg font-bold mb-2">Form Jabatan</h2>
            <div class="flex flex-col mb-3">
                <form action="{{ route('jabatan-add') }}" method="POST">
                    @csrf
                    <label for="nama" class="text-xs lg:text-sm">Nama</label>
                    <div class="flex">
                        <input type="text" class="w-5/6 rounded text-xs lg:text-sm" name="txtnama" id="txtnama"
                            value="{{ old('nama') }}" required autocomplete="off" maxlength="100">
                        <button class="w-1/6 bg-sky-700 text-xs lg:text-sm text-white rounded ml-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <table class="display text-xs lg:text-base" style="width:100%" id="tableJabatan">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">No</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Name</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Create at</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Update at</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Is active</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center hidden">
        <!-- Overlay hitam untuk latar belakang modal -->
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>

        <!-- Konten Modal -->
        <div class="bg-white w-2/3 lg:w-1/3 p-6 rounded-lg z-50">
            <!-- Tombol untuk menutup modal -->
            <button id="closeModal" class="absolute top-0 right-0 m-4 text-2xl" onclick="closeMdal()">&times;</button>

            <!-- Form -->
            <h5 class="uppercase font-bold mb-3 text-center">Update jabatan</h5>
            <form class="w-full max-w-lg" action="{{ route('jabatan-update') }}" method="post"
                onsubmit="return confirm('Are you sure to updated??')">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs lg:text-sm font-bold mb-2"
                            for="nama">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 text-xs lg:text-sm border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="update-id" type="hidden" name="txtid" autocomplete="off" autofocus required>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 text-xs lg:text-sm border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="update-nama" type="text" name="txtnama" autocomplete="off" autofocus required>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white text-xs lg:text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
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
                scrollY: '410px',
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
                        // console.log(res);
                    }
                })
            }
        }
    </script>
@endsection
