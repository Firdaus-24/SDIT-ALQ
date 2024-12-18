@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Master Jabatan
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Jabatan
                    </h3>
                    <div class="flex justify-end">
                        <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalJabatan">
                            <i class="ki-outline ki-plus-squared">
                            </i>
                            Tambah
                        </x-primary-button>
                        <x-danger-button type="button" data-modal-toggle="#modalImportJabatan">
                            <i class="ki-filled ki-file-down"></i>
                            Import
                        </x-danger-button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableJabatan">
                            <thead>
                                <tr>
                                    <th class="w-[30px]">
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
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Created at
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Updated at
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Status
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
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
                </div>
            </div>
        </div>
    </div>
    <!-- end: container -->

    <!-- start:modal -->
    <x-modal id="modalJabatan" modalTitle="Form Jabatan" modalSize="medium">
        <form action="" id="jabatan-form">
            <div class="w-full mt-3">
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                    <x-input-label>
                        Nama
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                    <x-text-input name="id" id="id" type="hidden" class="w-full" autocomplete="off"
                        maxlength="100" required></x-text-input>
                    <x-text-input name="txtnama" id="txtnama" type="text" class="w-full" value="{{ old('nama') }}"
                        autocomplete="off" maxlength="100" required></x-text-input>
                </div>
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

    <!-- start:modal import -->
    <x-modal-import-excel id="modalImportJabatan" modalTitle="Form Import Jabatan"
        form-id="form-import-jabatan"></x-modal-import-excel>
    <!-- end:modal import -->

    @push('js')
        <script>
            let modal = 'modalJabatan';
            let formMain = 'jabatan-form';
            let urlPost = "{!! route('jabatan.store') !!}"
            let dataTableList;
            let formUpload = $('#form-import-jabatan')
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "Jabatan",
            }
            let optionsImport = {
                modal: 'modalImportJabatan',
                url: "{!! route('jabatanImportProses') !!}",
                formFile: "form-import-jabatan",
                dataTable: null,
                disabledButton: () => {
                    $('#upload').addClass('disabled');
                    $('.loading').removeClass('hidden');
                },
                enabledButton: () => {
                    $('#upload').removeClass('disabled');
                    $('.loading').addClass('hidden');
                }
            }

            $(document).ready(function() {
                // data table
                dataTableList = $('#tableJabatan').DataTable({
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
                        url: "{!! route('jabatan.list') !!}",
                    },
                    dom: 'lBfrtip',
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
                            name: 'created_at',
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            name: 'Aksi',
                            data: 'Aksi',
                            orderable: false,
                            searchable: false,
                        }
                    ]
                });
                $('.dataTables_filter').addClass('mb-4');
                // form tambah dan update
                handleFormSubmit({
                    formSelector: formMain,
                    dataTableSelector: dataTableList,
                    modalSelector: modal,
                    baseUrl: '/jabatan',
                    methodOverride: true,
                });

                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    $("#id").val(rowData.id);
                    $("#txtnama").val(rowData.name);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/jabatan/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })

                formUpload.on('submit', function(e) {
                    e.preventDefault();
                    optionsImport.dataTable = dataTableList;
                    UPLOAD_FILE(optionsImport)
                });


            });
        </script>
    @endpush
@endsection
