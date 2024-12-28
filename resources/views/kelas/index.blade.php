@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Master Kelas
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Kelas
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('kelas.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalKelas">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableKelas">
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
    <x-modal id="modalKelas" modalTitle="Form Kelas" modalSize="medium">
        <form action="" id="kelas-form">
            <div class="w-full mt-3">
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                    <x-input-label>
                        Nama
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                    <x-text-input name="id" id="id" type="hidden" class="w-full" value=""
                        autocomplete="off" maxlength="100"></x-text-input>
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
    <x-modal-import-excel id="modalImportKelas" modalTitle="Form Import Kelas"
        form-id="form-import-Kelas"></x-modal-import-excel>
    <!-- end:modal import -->

    @push('js')
        <script>
            let modal = 'modalKelas';
            let formMain = 'kelas-form';
            let dataTableList;
            let formUpload = $('#form-import-kelas')
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "Kelas",
            }

            let optionsImport = {
                modal: 'modalImportKelas',
                url: "{!! route('kelas.import') !!}",
                formFile: "form-import-Kelas",
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
                dataTableList = $('#tableKelas').DataTable({
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
                        url: "{!! route('kelas.list') !!}",
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
                            data: 'nama',
                            name: 'nama',
                            orderable: true,
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
                handleFormSubmit({
                    formSelector: formMain,
                    dataTableSelector: dataTableList,
                    modalSelector: modal,
                    baseUrl: '/kelas',
                    methodOverride: true,
                });


                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    $("#id").val(rowData.id);
                    $("#txtnama").val(rowData.nama);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/kelas/${rowData.id}`;
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
