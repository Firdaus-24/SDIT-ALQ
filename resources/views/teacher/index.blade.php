@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3">TEACHERS</h1>
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <button class="bg-sky-700 p-2 text-white text-xs lg:text-base rounded-md mb-4 float-right"
                onclick="window.location.href = '{{ route('teachersAdd') }}'">Tambah</button>
            <table class="display text-xs lg:text-base" style="width:100%" id="tableTeacher">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">NIP</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Name</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Contact</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Email</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Jabatan</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">actions</th>
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

        const teacherDeletes = (id) => {
            if (confirm("Are you sure to deleted?") == true) {
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
