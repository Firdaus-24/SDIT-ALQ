@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">DETAIL PRESTASI SISWA</h1>
        <div class="hidden alert-prestasiDetail-delete">

        </div>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <button class="float-right p-2 mb-4 text-xs text-white rounded-md bg-sky-700 lg:text-base"
                onclick="window.location.href = '{{ route('detailprestasi-siswa.create') }}'">Tambah</button>
            <table class="text-xs display lg:text-base" style="width:100%" id="tableDetailPrestasi">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">No</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Nama</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Kelas</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Prestasi</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Tanggal</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Keterangan</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            $('#tableDetailPrestasi').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                ajax: {
                    url: "{{ route('detailprestasi-siswa.list') }}",
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
                        data: 'kelas',
                        name: 'kelas'
                    },
                    {
                        data: 'prestasi',
                        name: 'prestasi'
                    },
                    {
                        data: 'tanggal',
                        name: 'tangggal'
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

        const prestasiDetailDelete = (id) => {
            if (confirm("Anda yakin untuk di hapus?") == true) {
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: `detailprestasi-siswa/${id}`,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'method': 'put'
                    },
                    cache: false,
                    success: function(res) {
                        if (res.success == true) {
                            $('.alert-prestasiDetail-delete').show()
                            $('.alert-prestasiDetail-delete').html(`
                        <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                            role="alert">
                            <div class="flex">
                                <div class="py-1 mx-3">
                                    <i class="fa fa-exclamation"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold lg:text-base">Success</p>
                                    <p class="text-xs lg:text-sm"> ${res.msg}</p>
                                </div>
                            </div>
                        </div>
                        `)
                        } else {
                            return false
                        }
                        let oTable = $('#tableDetailPrestasi').dataTable();
                        oTable.fnDraw(false)
                    }
                })
            }
        }
    </script>
@endsection
