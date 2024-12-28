@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Master Siswa
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Siswa
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('siswa.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalSiswa">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                        {{-- <x-danger-button type="button" data-modal-toggle="#modalImportSiswa">
                            <i class="ki-filled ki-file-down"></i>
                            Import
                        </x-danger-button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableSiswa">
                            <thead>
                                <tr>
                                    <th class="w-[400]">
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
                                                NISN
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[50px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                JK
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[100px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Tempat Lahir
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[100px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Tanggal Lahir
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[100px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Agama
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
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
                                                Wali
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
    <x-modal id="modalSiswa" modalTitle="Form Siswa" modalSize="xlarge">
        <form action="" id="siswa-form" enctype="multipart/form-data">
            <div class="w-full mt-3">
                <div class="flex flex-col items-center justify-center">
                    <div class="relative w-20 h-20">
                        <img id="imagePreview" src="{{ asset('plugins/assets/media/avatars/blank.png') }}" alt="Preview"
                            class="object-cover w-full h-full border border-gray-300 rounded-full shadow-sm">
                        <input type="file"id="imageInput" name="image" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <p class="mt-2 mb-3 text-sm text-gray-500">Hanya format image .jpg, .png dan .jpeg</p>
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Nama
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txtnama" id="txtnama" type="text" class="w-full"
                            value="{{ old('txtnama') }}" autocomplete="off" maxlength="100" required></x-text-input>
                        <x-text-input name="id" id="id" type="hidden" class="w-full" autocomplete="off"
                            maxlength="255"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                NIS
                            </x-input-label>
                        </div>
                        <x-text-input name="txtnis" id="txtnis" type="text" class="w-full"
                            value="{{ old('txtnis') }}" autocomplete="off" maxlength="100"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                NISN
                            </x-input-label>
                        </div>
                        <x-text-input name="txtnisn" id="txtnisn" type="text" class="w-full"
                            value="{{ old('txtnisn') }}" autocomplete="off" maxlength="100"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Jenis Kelamin
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-select name="txtjk" id="txtjk" required=true>
                            <option value="">Pilih</option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-Laki</option>
                        </x-select>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Tempat Lahir
                            </x-input-label>
                        </div>
                        <x-text-input name="txttempat" id="txttempat" type="text" class="w-full"
                            value="{{ old('txttempat') }}" autocomplete="off" maxlength="100"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Tanggal Lahir
                            </x-input-label>
                        </div>
                        <x-text-input name="txttgllahir" id="txttgllahir" type="date" class="w-full"
                            value="{{ old('txttgllahir') }}"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Rombel
                            </x-input-label>
                        </div>
                        <x-text-input name="txtrombel" id="txtrombel" type="text" class="w-full"
                            value="{{ old('txtrombel') }}" autocomplete="off" maxlength="200"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Agama
                            </x-input-label>
                        </div>
                        <x-text-input name="txtagama" id="txtagama" type="text" class="w-full" maxlength="20"
                            value="{{ old('txtagama') }}"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Kelas
                            </x-input-label>
                        </div>
                        <x-select name="txtkelas" id="txtkelas">
                            <option value="">Pilih</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('txtkelas') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Nama Wali
                            </x-input-label>
                        </div>
                        <x-text-input name="txtwali" id="txtwali" type="text" class="w-full"
                            value="{{ old('txtwali') }}" autocomplete="off" maxlength="255"></x-text-input>
                    </div>

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
    {{-- <x-modal-import-excel id="modalImportSiswa" modalTitle="Form Import Siswa"
        form-id="form-import-siswa"></x-modal-import-excel> --}}
    <!-- end:modal import -->

    <!-- start:modal profile -->
    <x-modal-detail-siswa></x-modal-detail-siswa>
    <!-- end:end modal -->

    @push('js')
        <script>
            let modal = 'modalSiswa';
            let formMain = 'siswa-form';
            let urlPost = "{!! route('siswa.store') !!}"
            let dataTableList;
            let formUpload = $('#form-import-siswa')
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "Siswa",
            }
            let optionsImport = {
                modal: 'modalImportSiswa',
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
                dataTableList = $('#tableSiswa').DataTable({
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
                        url: "{!! route('siswa.list') !!}",
                    },
                    dom: 'lBfrtip',
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'nisn',
                            name: 'nisn'
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jk',
                            orderable: false
                        },
                        {
                            data: 'tempat_lahir',
                            name: 'tempat lahir'
                        },
                        {
                            data: 'tanggal_lahir',
                            name: 'tanggal lahir'
                        },
                        {
                            data: 'agama',
                            name: 'agama',
                            orderable: false
                        },
                        {
                            data: 'kelas',
                            name: 'kelas'
                        },
                        {
                            data: 'wali',
                            name: 'wali',
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
                // form tambah dan update
                handleFormSubmit({
                    formSelector: formMain,
                    dataTableSelector: dataTableList,
                    modalSelector: modal,
                    baseUrl: '/siswa',
                    methodOverride: true,
                });

                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    let foto = rowData.images ? "storage/" + rowData.images :
                        "plugins/assets/media/avatars/blank.png"

                    let id = rowData.id
                    let nama = rowData.nama
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(nama, 'text/html');

                    let textNama = nama ? doc.querySelector('p').textContent.trim() :
                        '-';

                    options.id = id;
                    $("#imagePreview").attr("src", foto);
                    $("#id").val(rowData.id);
                    $("#txtnama").val(textNama);
                    $("#txtnis").val(rowData.nis);
                    $("#txtnisn").val(rowData.nisn);
                    $("#txtjk").val(rowData.jenis_kelamin);
                    $("#txttempat").val(rowData.tempat_lahir);
                    $("#txttgllahir").val(rowData.tanggal_lahir);
                    $("#txtrombel").val(rowData.rombel);
                    $("#txtagama").val(rowData.agama);
                    $("#txtkelas").val(rowData.kelas_id);
                    $("#txtwali").val(rowData.wali);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/siswa/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })

                $('#imageInput').on('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                formUpload.on('submit', function(e) {
                    e.preventDefault();
                    optionsImport.dataTable = dataTableList;
                    UPLOAD_FILE(optionsImport)
                });


            });
        </script>
    @endpush
@endsection
