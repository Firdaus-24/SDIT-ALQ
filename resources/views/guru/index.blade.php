@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Guru
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Guru
                    </h3>
                    <div class="flex justify-end">
                        <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalGuru">
                            <i class="ki-outline ki-plus-squared">
                            </i>
                            Tambah
                        </x-primary-button>
                        <x-danger-button type="button" data-modal-toggle="#modalImportGuru">
                            <i class="ki-filled ki-file-down"></i>
                            Import
                        </x-danger-button>
                    </div>
                </div>
                <div class="w-full card-body">
                    <div data-datatable="true" data-datatable-page-size="5" data-datatable-state-save="true"
                        id="contentTableGuru">
                        <div class="p-4 overflow-x-auto scrollable-x-auto">
                            <table class="table w-full mt-3 table-auto table-border" data-datatable-table="true"
                                id="dtableGuru">
                                <thead>
                                    <tr>
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
                                                    Jabatan
                                                </span>
                                                <span class="sort-icon">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-[200px]">
                                            <span class="sort">
                                                <span class="sort-label">
                                                    Contact
                                                </span>
                                                <span class="sort-icon">
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-[200px]">
                                            <span class="sort">
                                                <span class="sort-label">
                                                    Email
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
                                                    Actions
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
    </div>
    <!-- end: container -->

    <!-- start:modal -->
    <x-modal id="modalGuru" modalTitle="Form Guru" modalSize="xlarge">
        <form action="" id="guru-form" enctype="multipart/form-data">
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
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Jabatan
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-select name="txtjabatan" id="txtjabatan" required=true>
                            <option value="">Pilih</option>
                            @foreach ($jabatans as $j)
                                <option value="{{ $j->id }}" {{ old('txtjabatan') == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama }}</option>
                            @endforeach
                        </x-select>
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
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txttempat" id="txttempat" type="text" class="w-full"
                            value="{{ old('txttempat') }}" autocomplete="off" maxlength="200" required></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Tanggal Lahir
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txttgllahir" id="txttgllahir" type="date" class="w-full"
                            value="{{ old('txttgllahir') }}" required></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Jurusan Kuliah
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txtjurusan" id="txtjurusan" type="text" class="w-full"
                            value="{{ old('txtjurusan') }}" autocomplete="off" maxlength="200" required></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Tahun Lulus
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txttahunlulus" id="txttahunlulus" type="text" class="w-full"
                            value="{{ old('txttahunlulus') }}"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                NUPTK
                            </x-input-label>
                        </div>
                        <x-text-input name="txtnuptk" id="txtnuptk" type="number" class="w-full"
                            value="{{ old('txtnuptk') }}" autocomplete="off" maxlength="200"></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                No HP
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txtnohp" id="txtnohp" type="text" class="w-full"
                            value="{{ old('txtnohp') }}" autocomplete="off" maxlength="20" required></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Email
                            </x-input-label>
                            <span class="text-danger">
                                *
                            </span>
                        </div>
                        <x-text-input name="txtemail" id="txtemail" type="text" class="w-full"
                            value="{{ old('txtemail') }}" autocomplete="off" maxlength="20" required></x-text-input>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <x-input-label>
                                Guru Kelas
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

    @push('js')
        <script>
            let modal = 'modalGuru';
            let formMain = 'guru-form';
            let urlPost = "{!! route('guru.store') !!}"
            let dataTableList;
            // let formUpload = $('#form-import-guru')
            let options = {
                modal: modal,
                id: null,
                url: urlPost,
                data: null,
                dataTable: null,
                formMain: formMain,
                disabledButton: () => {
                    $('#save').addClass('disabled');
                    $('.loading').removeClass('hidden');
                },
                enabledButton: () => {
                    $('#save').removeClass('disabled');
                    $('.loading').addClass('hidden');
                }
            }
            // let optionsImport = {
            //     modal: 'modalImportJabatan',
            //     url: "{!! route('jabatanImportProses') !!}",
            //     formFile: "form-import-jabatan",
            //     dataTable: null,
            //     disabledButton: () => {
            //         $('#upload').addClass('disabled');
            //         $('.loading').removeClass('hidden');
            //     },
            //     enabledButton: () => {
            //         $('#upload').removeClass('disabled');
            //         $('.loading').addClass('hidden');
            //     }
            // }

            $(document).ready(function() {
                dataTableList = $('#dtableGuru').DataTable({
                    dom: '<"custom-search"f>t<"bottom"ip>',
                    language: {
                        search: "Cari",
                    },
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    searching: true,
                    ajax: {
                        url: "{{ route('guru.list') }}",
                    },
                    dom: 'lBfrtip',
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jabatan',
                            name: 'jabatan'
                        },
                        {
                            data: 'contact',
                            name: 'contact'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            className: 'text-center'
                        }
                    ]
                });

                $('.dataTables_filter').addClass('mb-4');

                // form tambah dan update
                dataTableList.ajax.reload();
                Array.prototype.filter.call($(`#${options.formMain}`), function(form) {
                    form.addEventListener('submit', async function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            event.stopPropagation();
                            options.disabledButton();
                            let formData = new FormData($(`#${options.formMain}`)[0]);

                            if (options.id == null) saveData(formData);
                            if (options.id) updateData(formData);
                        }
                    });
                });

                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    let foto = rowData.images ? "storage/" + rowData.images :
                        "plugins/assets/media/avatars/blank.png"
                    let nama = rowData.nama
                    let jabatan = rowData.jab_id
                    let jenisKelamin = rowData.jenis_kelamin
                    let templatLahir = rowData.tempat_lahir
                    let tanggalLahir = rowData.tanggal_lahir
                    let jurusan = rowData.jurusan
                    let tahunLulus = rowData.tahun_lulus
                    let nuptk = rowData.nuptk
                    let noHp = rowData.contact
                    let email = rowData.email
                    let kelas = rowData.kelas_id

                    let parser = new DOMParser();
                    let doc = parser.parseFromString(nama, 'text/html');

                    // Cari elemen <p> dan ambil teksnya
                    let text = nama ? doc.querySelector('p').textContent.trim() :
                        'plugins/assets/media/avatars/blank.png';

                    options.id = rowData.id;
                    $("#imagePreview").attr("src", foto);
                    $("#txtnama").val(text);
                    $("#txtjabatan").val(jabatan);
                    $("#txtjk").val(
                        jenisKelamin);
                    $("#txtjk").val(jenisKelamin);
                    $("#txttempat").val(
                        templatLahir);
                    $("#txttgllahir").val(tanggalLahir);
                    $("#txtjurusan").val(
                        jurusan);
                    $("#txttahunlulus").val(tahunLulus);
                    $("#txtnuptk").val(nuptk);
                    $(
                        "#txtnohp").val(noHp);
                    $("#txtemail").val(email);
                    $("#txtkelas").val(kelas);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.dataTitle = rowData.nama;
                    deleteData(rowData.id);
                })

                const saveData = (formData) => {
                    options.data = formData;
                    options.dataTable = dataTableList;
                    POST_DATA(options);
                }

                const updateData = (formData) => {
                    options.data = formData;
                    options.dataTable = dataTableList;
                    PATCH_DATA(options);
                }

                const deleteData = (id) => {
                    options.id = id;
                    options.dataTable = dataTableList;
                    DELETE_DATA(options);
                }

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

            });

            // const teacherDeletes = (id, active) => {
            //     const msg = (active == "T") ? "Anda yakin untuk menonaktifkan?" : "Anda yakin mengaktifkan?"
            //     Swal.fire({
            //         title: msg,
            //         icon: "question",
            //         showCancelButton: true,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Confirm"
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 type: "DELETE",
            //                 data: {
            //                     id
            //                 },
            //                 url: `{{ url('guru/${id}') }}`,
            //                 dataType: 'json',
            //                 success: function(res) {
            //                     let oTable = $('#tableTeacher').dataTable();
            //                     oTable.fnDraw(false)

            //                     Swal.fire({
            //                         title: active == 1 ? "Dihapus!" : "Active",
            //                         text: active == 1 ? "Data berhasil dihapus" :
            //                             "Data berhasil active kembali",
            //                         icon: "success",
            //                         timer: 2000,
            //                         showConfirmButton: false
            //                     });
            //                 }
            //             })

            //         }
            //     });
            // }
        </script>
    @endpush
@endsection
