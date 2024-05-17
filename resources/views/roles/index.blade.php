@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">ROLES</h1>
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
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <span class="float-right">
                <button class="p-2 mb-4 text-xs text-white rounded-md bg-sky-700 lg:text-base"
                    onclick="window.location.href = '{{ route('roles.create') }}'">Tambah</button>

            </span>
            <table class="text-xs display lg:text-base" style="width:100%" id="tableRole">
                <thead>
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">No</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Name</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Total users</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">Permissions</th>
                        <th class="px-6 py-2 text-xs text-gray-500 lg:text-sm">actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        $(function() {
            $('#tableRole').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: true,
                searching: true,
                // scrollY: '410px',
                ajax: {
                    url: "{{ route('roles.list') }}",
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
                        data: 'total_users',
                        name: 'total_users',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'permissions',
                        name: 'permissions',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false
                    }
                ],
            });


        });
    </script>
@endsection
