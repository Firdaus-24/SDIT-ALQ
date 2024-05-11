@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">GURU</h1>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <span class="float-right">
                <button type="button" class="p-2 mb-4 text-xs text-white bg-red-700 rounded-md lg:text-base"
                    onclick="window.location.href = '{{ route('importFileTeacher') }}'">Import</button>
                <button class="p-2 mb-4 text-xs text-white rounded-md bg-sky-700 lg:text-base"
                    onclick="window.location.href = '{{ route('teachersAdd') }}'">Tambah</button>

            </span>
            <table class="text-xs display lg:text-base" style="width:100%" id="tableTeacher">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">NIP</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Nama</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Contact</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Email</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Jabatan</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            $('#tableTeacher').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                scrollY: '500px',
                ajax: {
                    url: "{{ route('listTeachers') }}",
                },
                // dom: 'lBfrtip', // Add the Buttons extension to the DataTable
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
                        data: 'noHp',
                        name: 'contact'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false
                    }
                ]
            });


        });

        const teacherDeletes = (id, active) => {
            const msg = (active == "T") ? "Anda yakin untuk menonaktifkan?" : "Anda yakin mengaktifkan?"
            if (confirm(msg) == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        id
                    },
                    url: `{{ url('teacherDelete') }}`,
                    dataType: 'json',
                    success: function(res) {
                        // console.log(res);
                        let oTable = $('#tableTeacher').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
