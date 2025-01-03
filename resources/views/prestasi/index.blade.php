@extends('layouts.backend.dashboard.app')

@section('container')
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Master Prestasi Siswa
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Prestasi Siswa
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('prestasi-siswa.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalPrestasi">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tablePrestasi">
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
                                                Skor
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

    <!-- Modal -->
    <x-modal id="modalPrestasi" modalTitle="Form Master Prestasi" modalSize="medium">
        <form action="" id="prestasi-form">
            <div class="w-full mt-3">
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <x-input-label>
                        Nama
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                    <x-text-input name="id" id="id" type="hidden" class="w-full" value=""
                        autocomplete="off" maxlength="100"></x-text-input>
                    <x-text-input name="txtnama" id="txtnama" type="text" class="w-full" value="{{ old('name') }}"
                        autocomplete="off" maxlength="100" required></x-text-input>
                </div>
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                    <x-input-label>
                        Score
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                    <x-text-input name="txtscore" id="txtscore" type="number" class="w-full" value="{{ old('name') }}"
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

    @push('js')
        <script>
            let modal = 'modalPrestasi';
            let formMain = 'prestasi-form';
            let dataTableList;
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "prestasi siswa",
            }

            $(function() {
                dataTableList = $('#tablePrestasi').DataTable({
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
                        url: "{!! route('prestasi.list') !!}",
                    },
                    "columnDefs": [{
                        "targets": 0,
                        "className": "text-center",
                    }],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'score',
                            name: 'score',
                            orderable: false
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active',
                            className: 'text-center',
                            orderable: false
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false
                        }
                    ]
                });
                $('.dataTables_filter').addClass('mb-4');


                handleFormSubmit({
                    formSelector: formMain,
                    dataTableSelector: dataTableList,
                    modalSelector: modal,
                    baseUrl: '/prestasi-siswa',
                    methodOverride: true,
                });



                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    $("#id").val(rowData.id);
                    $("#txtnama").val(rowData.nama);
                    $("#txtscore").val(rowData.score);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/prestasi-siswa/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })

            });
        </script>
    @endpush
@endsection
