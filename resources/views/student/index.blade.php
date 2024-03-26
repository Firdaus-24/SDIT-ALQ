@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3">STUDENT</h1>
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <button class="bg-sky-700 p-2 text-white text-xs lg:text-base rounded-md mb-4 float-right"
                onclick="window.location.href = '{{ route('studentCreate') }}'">Tambah</button>
            <table class="display text-xs lg:text-base" style="width:100%" id="tableStudent">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Name</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">NISN</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">JK</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Tempat Lahir</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Tanggal Lahir</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Agama</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Kelas</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Wali</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">actions</th>
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
