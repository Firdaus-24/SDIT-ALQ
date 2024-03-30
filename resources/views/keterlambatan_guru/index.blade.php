@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3">KETERLAMBATAN GURU</h1>
        <div class="alert-keterlambatan-delete hidden">

        </div>
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <button class="bg-sky-700 p-2 text-white text-xs lg:text-base rounded-md mb-4 float-right"
                onclick="window.location.href = '{{ route('keterlambatanAdd') }}'">Tambah</button>
            <table class="display text-xs lg:text-base" style="width:100%" id="tableTeacher">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">No</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Name</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Jabatan</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Tanggal</th>
                        <th class="px-6 py-2 text-xs lg:text-sm text-gray-500">Keterangan</th>
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
                ajax: {
                    url: "{{ route('list.keterlambatan') }}",
                },
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
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false
                    }
                ]
            });
        });

        const keterlambatanDelete = (id) => {
            if (confirm("Are you sure to deleted?") == true) {
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: `keterlambatan/delete/${id}`,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'method': 'put'
                    },
                    cache: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('.alert-keterlambatan-delete').show()
                            $('.alert-keterlambatan-delete').html(`
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-3 rounded-lg"
                            role="alert">
                            <div class="flex">
                                <div class="py-1 mx-3">
                                    <i class="fa fa-exclamation"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-sm lg:text-base">Success</p>
                                    <p class="text-xs lg:text-sm"> ${res.msg}</p>
                                </div>
                            </div>
                        </div>
                        `)
                        } else {
                            return false
                        }
                        let oTable = $('#tableTeacher').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
