@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Pelanggaran Siswa
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Pelanggaran Siswa
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('kelas.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalKesalahanSiswa">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableKesalahanSiswa">
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
                                    <th class="w-[250px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Nama
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[100px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Kelas
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Kesalahan
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[130px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Tanggal
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[250px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Keterangan
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[50px]">
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
    <x-modal id="modalKesalahanSiswa" modalTitle="Form Kesalahan / Pelanggaran Siswa" modalSize="medium">
        <form action="" id="kesalahansiswa-form">
            <div class="w-full mt-3">
                <div class="flex flex-wrap items-baseline gap-3 mb-3 lg:flex-nowrap">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Nama
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <x-text-input name="id" id="id" type="hidden" class="w-full" value=""
                        autocomplete="off" maxlength="100"></x-text-input>
                    <x-text-input name="txtidsiswa" id="txtidsiswa" type="hidden" class="w-full" value=""
                        autocomplete="off" maxlength="100"></x-text-input>
                    <x-text-input name="txtnama" id="txtnama" type="text" value="{{ old('nama') }}"
                        autocomplete="off" required></x-text-input>
                </div>
                <div class=" items-baseline flex-wrap lg:flex-nowrap gap-2.5 hidden tbl-detailPrestasi-add mb-3">
                    <div data-datatable="true" data-datatable-page-size="5">
                        <div class="scrollable-x-auto">
                            <table class="table text-sm table-border" data-datatable-table="true">
                                <thead>
                                    <tr>
                                        <th class="w-[60px]">
                                            Pilih
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Kelas
                                        </th>
                                        <th>
                                            NISN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Kelas
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <x-text-input name="txtkelas" id="txtkelas" type="text" autocomplete="off" readonly></x-text-input>
                </div>
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Jenis Kesalaan
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <select name="txtkesalahanId" id="txtkesalahanId" class="select" required>
                        <option value="">Pilih</option>
                        @foreach ($kesalahan as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->nama }} - Score {{ $p->score }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Tanggal
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <x-text-input name="txttanggal" id="txttanggal" type="datetime-local"
                        autocomplete="off"></x-text-input>
                </div>
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                    <div class="flex flex-shrink-0 w-32 gap-1">
                        <x-input-label>
                            Keterangan
                        </x-input-label>
                        <span class="text-danger">
                            *
                        </span>
                    </div>
                    <textarea name="txtketerangan" id="txtketerangan" class="textarea" maxlength="255"
                        placeholder="Masukan keterangan anda">{{ old('txtketerangan') }}</textarea>
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
            let modal = 'modalKesalahanSiswa';
            let formMain = 'kesalahansiswa-form';
            let dataTableList;
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "Kelas",
            }

            $(document).ready(function() {
                // data table
                dataTableList = $('#tableKesalahanSiswa').DataTable({
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
                        url: "{!! route('detailkesalahan-siswa.list') !!}",
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
                            data: 'kelas',
                            name: 'kelas',
                            orderable: false,
                        },
                        {
                            data: 'kesalahan',
                            name: 'kesalahan',
                        },
                        {
                            data: 'tanggal',
                            name: 'tanggal',
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan',
                            orderable: false,
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
                    baseUrl: '/detailkesalahan-siswa',
                    methodOverride: true,
                });


                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    $("#id").val(rowData.id);
                    $("#txtidsiswa").val(rowData.siswa_id);
                    $("#txtnama").val(rowData.nama);
                    $("#txtkelas").val(rowData.kelas);
                    $("#txtkesalahanId").val(rowData.kesalahan_id);
                    $("#txttanggal").val(rowData.tanggal);
                    $("#txtketerangan").val(rowData.keterangan);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/detailkesalahan-siswa/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })

                $(document).on('keyup', '#txtnama', function() {
                    let url = "{{ route('detailkesalahan-siswaByName.list', ':name') }}";
                    options.url = url.replace(':name', this.value);

                    if (this.value.length > 0) {
                        $.ajax({
                            type: "GET",
                            url: options.url,
                            dataType: "json",
                            success: function(msg) {
                                let trhtml = "";
                                if (msg.length > 0) {
                                    $.each(msg, function(i, data) {
                                        let kelas = data.kelas?.nama ?? '-';
                                        let nisn = data.nisn ? data.nisn : '-';
                                        trhtml += `<tr>
                                                    <td class="px-6 py-4 border border-gray-300">
                                                        <input type='radio' onclick="getNameStudent('${data.id}', '${data.nama}', '${kelas}')">
                                                    </td>
                                                    <td class="px-6 py-4 border border-gray-300">${data.nama}</td>
                                                    <td class="px-6 py-4 border border-gray-300">${nisn}</td>
                                                    <td class="px-6 py-4 border border-gray-300">${kelas}</td>
                                                </tr>`;
                                    });

                                    // Tampilkan tabel dan masukkan data ke tbody
                                    $('.tbl-detailPrestasi-add').show();
                                    $('.tbl-detailPrestasi-add tbody').html(trhtml);
                                } else {
                                    // Jika data kosong
                                    $('.tbl-detailPrestasi-add').hide();
                                    $('.tbl-detailPrestasi-add tbody').html('');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", error);
                                $('.tbl-detailPrestasi-add').hide();
                                $('.tbl-detailPrestasi-add tbody').html('');
                            }
                        });
                    } else {
                        // Jika input kosong
                        $('.tbl-detailPrestasi-add').hide();
                        $('.tbl-detailPrestasi-add tbody').html('');
                    }


                })
            });

            const getNameStudent = (id, name, kelas) => {
                $(".tbl-detailPrestasi-add").hide()
                $(".tbl-detailPrestasi-add tbody").empty();
                $("#txtidsiswa").val(id)
                $("#txtnama").val(name)
                $("#txtkelas").val(kelas)
            }
        </script>
    @endpush
@endsection
