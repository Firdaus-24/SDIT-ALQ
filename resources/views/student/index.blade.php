@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">SISWA</h1>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <span class="float-right">
                <button type="button" class="p-2 mb-4 text-xs text-white bg-red-700 rounded-md lg:text-base"
                    onclick="window.location.href = '{{ route('studentImport') }}'">Import</button>
                <button class="p-2 mb-4 text-xs text-white rounded-md bg-sky-700 lg:text-base"
                    onclick="window.location.href = '{{ route('studentCreate') }}'">Tambah</button>
            </span>

            <table class="text-xs display lg:text-base" style="width:100%" id="tableStudent">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Name</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">NISN</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">JK</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Tempat Lahir</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Tanggal Lahir</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Agama</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Kelas</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Wali</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            $('#tableStudent').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                // scrollY: '500px',
                ajax: {
                    url: "{{ route('list.student') }}",
                },
                columns: [
                    // {
                    //     data: 'DT_RowIndex',
                    //     name: 'DT_RowIndex',
                    //     orderable: false,
                    //     searchable: false
                    // },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nisn',
                        name: 'nis'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jk'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat lahir'
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl lahir'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'kelas',
                        name: 'kelas'
                    },
                    {
                        data: 'wali',
                        name: 'wali'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false
                    }
                ]
            });


        });

        const studentDelete = (id) => {
            if (confirm("Are you sure to deleted?") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        id
                    },
                    url: `{{ url('studentDelete') }}`,
                    dataType: 'json',
                    success: function(res) {
                        // console.log(res);
                        let oTable = $('#tableStudent').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
