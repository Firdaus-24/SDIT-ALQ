@extends('layouts.backend.dashboard.app')

@push('css')
    <style>
        .table-permission {
            max-height: 8rem;
            overflow-y: auto;
            overflow-x: hidden;
            white-space: normal;
            word-wrap: break-word;
            word-break: break-word;
        }
    </style>
@endpush

@section('container')
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Management Role
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Management Role
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('roles.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalRole">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableRole">
                            <thead>
                                <tr>
                                    <th class="w-[20px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                No
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Nama
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[60px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Total User
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[300px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Permission
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[100px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Aksi
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Container -->
                    <div class="flex items-center gap-4 mt-4">
                        <span data-datatable-info="true" class="text-sm text-gray-600"></span>
                        <div class="flex items-center gap-4 pagination" data-datatable-pagination="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: container -->

    <!-- start:modal -->
    <x-modal id="modalRole" modalTitle="Form roles" modalSize="medium">
        <form action="" id="role-form">
            <div class="w-full mt-3">
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Nama Role
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <x-text-input name="id" id="id" type="hidden" class="w-full" value=""
                        autocomplete="off" maxlength="100"></x-text-input>
                    <x-text-input name="txtroles" id="txtroles" type="text" class="w-full" value="{{ old('txtroles') }}"
                        autocomplete="off" maxlength="100" required></x-text-input>
                </div>
                @foreach ($permissionList as $category => $permissions)
                    <div class="flex flex-col gap-2.5 mb-3 pl-5">
                        <!-- Label Kategori -->
                        <div class="flex flex-shrink-0 w-full gap-1">
                            <x-input-label>
                                {{ ucfirst($category) }}
                            </x-input-label>
                        </div>
                        <!-- Daftar Permissions -->
                        <div class="flex flex-col gap-2.5 pl-5">
                            @foreach ($permissions as $permission)
                                <div class="flex items-center gap-2.5">
                                    <label class="form-label gap-2.5">
                                        <input class="checkbox checkbox-sm" name="permissions[]"
                                            id="permission{{ $permission['id'] }}" type="checkbox"
                                            value="{{ $permission['id'] }}" />
                                        {{ $permission['permission'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
            <hr class="mt-4">
            <div class="grid mt-4 justify-items-center">
                <div class="flex gap-4">
                    <x-secondary-button data-modal-dismiss="true">
                        Cancel
                    </x-secondary-button>
                    <x-primary-button>
                        <x-spinner></x-spinner>
                        Save
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>
    <!-- end:modal -->

    @push('js')
        <script>
            let modal = 'modalRole';
            let formMain = 'role-form';
            let dataTableList;
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "management role user",
            }


            $(document).ready(function() {
                // data table
                dataTableList = $('#tableRole').DataTable({
                    dom: '<"top"f>rt<"bottom"ip><"clear">',
                    language: {
                        search: "Cari",
                    },
                    processing: true,
                    serverSide: true,
                    paging: true,
                    responsive: true,
                    searching: true,
                    ajax: {
                        url: "{!! route('roles.list') !!}",
                    },
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
                    "columnDefs": [{
                        "targets": 0,
                        "className": "text-center",
                    }],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: true,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'nama',
                            orderable: true,
                        },
                        {
                            data: 'total_users',
                            name: 'total_users',
                            className: 'text-center'
                        },
                        {
                            data: 'permissions',
                            name: 'permissions',
                        },
                        {
                            name: 'aksi',
                            data: 'aksi',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        }
                    ]
                });


                $('.dataTables_filter').addClass('mb-4');
                // handle form submit
                handleFormSubmitRole({
                    formSelector: formMain,
                    dataTableSelector: dataTableList,
                    modalSelector: modal,
                    baseUrl: '/roles',
                    methodOverride: true,
                });


                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();

                    $("#id").val(rowData.id);
                    $("#txtroles").val(rowData.name);
                    // Bersihkan semua checkbox
                    let rowNode = dataTableList.row($(this).closest('tr')).node();

                    let permissionsData = $(rowNode).find('.permission-id').map(function() {
                        return $(this).text().trim();
                    }).get();

                    if (permissionsData) {
                        permissionsData.forEach(permissionId => {
                            $(`#permission${permissionId}`).prop('checked', true);
                        });
                    }
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/roles/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })


            });
            const handleFormSubmitRole = ({
                formSelector,
                dataTableSelector,
                modalSelector,
                baseUrl,
                methodOverride = false,
            }) => {
                $("#" + formSelector).on("submit", function(e) {
                    e.preventDefault();

                    const form = $(this)[0];
                    const formData = new FormData(form);

                    const id = $("#id").val();
                    const url = id ? `${baseUrl}/${id}` : baseUrl;
                    const method = id && methodOverride ? "PUT" : "POST";

                    if (method === "PUT") {
                        formData.append("_method", "PUT");
                    }

                    $.ajax({
                        url: url,
                        type: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: formData,
                        contentType: false, // Jangan ubah Content-Type
                        processData: false, // Jangan proses data menjadi string
                        beforeSend: function() {
                            LOADING_ALERT("Sedang menyimpan data");
                        },
                        success: function(response) {
                            $("#id").val("");
                            closeModal(modalSelector);
                            removeBackdrop();
                            SUCCESS_ALERT()
                            $('#tableRole').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseJSON);
                            ERROR_ALERT(xhr.responseJSON.message || "An error occurred.");
                        },
                    });
                });
            };
        </script>
    @endpush
@endsection
