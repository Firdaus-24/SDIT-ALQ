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
                            <table class="table w-full table-auto table-border" data-datatable-table="true" id="dtableGuru">
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
                                                    Active
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
                <div class="flex items-center justify-center">
                    <div class="image-input size-16" data-image-input="true" id="image-input">
                        <input name="image" type="file" accept=".png, .jpg, .jpeg" id="image" />
                        <input name="avatar_remove" type="hidden" />
                        <div class="btn btn-icon btn-icon-xs btn-light shadow-default absolute z-1 size-5 -top-0.5 -right-0.5 rounded-full"
                            data-image-input-remove="" data-tooltip="#image_input_tooltip" data-tooltip-trigger="hover">
                            <i class="ki-outline ki-cross">
                            </i>
                        </div>
                        <span class="tooltip" id="image_input_tooltip">
                            Click to remove or revert
                        </span>
                        <div class="border-2 rounded-full image-input-placeholder border-success image-input-empty:border-gray-300"
                            style="background-image:url({{ asset('assets/images/illustrations/blank.png') }})">
                            <div class="rounded-full image-input-preview">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 right-0 flex items-center justify-center h-5 cursor-pointer bg-dark-clarity">
                                <svg class="fill-light opacity-80" height="12" viewbox="0 0 14 12" width="14"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.6665 2.64585H11.2232C11.0873 2.64749 10.9538 2.61053 10.8382 2.53928C10.7225 2.46803 10.6295 2.36541 10.5698 2.24335L10.0448 1.19918C9.91266 0.931853 9.70808 0.707007 9.45438 0.550249C9.20068 0.393491 8.90806 0.311121 8.60984 0.312517H5.38984C5.09162 0.311121 4.799 0.393491 4.5453 0.550249C4.2916 0.707007 4.08701 0.931853 3.95484 1.19918L3.42984 2.24335C3.37021 2.36541 3.27716 2.46803 3.1615 2.53928C3.04584 2.61053 2.91234 2.64749 2.7765 2.64585H2.33317C1.90772 2.64585 1.49969 2.81486 1.19885 3.1157C0.898014 3.41654 0.729004 3.82457 0.729004 4.25002V10.0834C0.729004 10.5088 0.898014 10.9168 1.19885 11.2177C1.49969 11.5185 1.90772 11.6875 2.33317 11.6875H11.6665C12.092 11.6875 12.5 11.5185 12.8008 11.2177C13.1017 10.9168 13.2707 10.5088 13.2707 10.0834V4.25002C13.2707 3.82457 13.1017 3.41654 12.8008 3.1157C12.5 2.81486 12.092 2.64585 11.6665 2.64585ZM6.99984 9.64585C6.39413 9.64585 5.80203 9.46624 5.2984 9.12973C4.79478 8.79321 4.40225 8.31492 4.17046 7.75532C3.93866 7.19572 3.87802 6.57995 3.99618 5.98589C4.11435 5.39182 4.40602 4.84613 4.83432 4.41784C5.26262 3.98954 5.80831 3.69786 6.40237 3.5797C6.99644 3.46153 7.61221 3.52218 8.1718 3.75397C8.7314 3.98576 9.2097 4.37829 9.54621 4.88192C9.88272 5.38554 10.0623 5.97765 10.0623 6.58335C10.0608 7.3951 9.73765 8.17317 9.16365 8.74716C8.58965 9.32116 7.81159 9.64431 6.99984 9.64585Z"
                                        fill="">
                                    </path>
                                    <path
                                        d="M7 8.77087C8.20812 8.77087 9.1875 7.7915 9.1875 6.58337C9.1875 5.37525 8.20812 4.39587 7 4.39587C5.79188 4.39587 4.8125 5.37525 4.8125 6.58337C4.8125 7.7915 5.79188 8.77087 7 8.77087Z"
                                        fill="">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
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
                        <x-text-input name="txttahunlulus" id="txttahunlulus" type="date" class="w-full"
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
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false, // Disable automatic width calculation
                    searching: true,
                    ajax: {
                        url: "{{ route('guru.list') }}",
                    },
                    dom: 'lBfrtip',
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
                            data: 'active',
                            name: 'active'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false
                        }
                    ]
                });

                $("#image").on('change', function() {
                    let file = this.files[0]; // Mengambil file pertama yang dipilih
                    if (file) {
                        console.log(file.name); // Menampilkan nama file
                    } else {
                        console.log("No file selected.");
                    }
                });
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
                            if (fileFoto) {
                                formData.append('image',
                                fileFoto); // 'image' adalah nama field yang sesuai dengan input file
                            }
                            for (let [key, value] of formData.entries()) {
                                console.log(key, value);
                            } // Debug isi FormData
                            return false
                            if (options.id == null) saveData(formData);
                            if (options.id) updateData(formData);
                        }
                    });
                });

                // $(`#${options.formMain}`).on('submit', async function(event) {
                //     event.preventDefault();
                //     event.stopPropagation();
                //     let fileFoto = document.getElementById('image').files[0];
                //     let form = $(this)[0]; // Mengambil elemen form
                //     if (form.checkValidity() === false) {
                //         form.classList.add('was-validated'); // Tambahkan class jika form tidak valid
                //     } else {
                //         options.disabledButton(); 

                //         let formData = new FormData(form); 
                //         if (fileFoto) {
                //             formData.append('image', fileFoto); 
                //         }

                //         // Debug isi FormData
                //         for (let [key, value] of formData.entries()) {
                //             console.log(key, value);
                //         }

                //         // Pilih aksi berdasarkan options.id
                //         if (options.id == null) {
                //             saveData(formData); // Fungsi untuk menyimpan data baru
                //         } else {
                //             updateData(formData); // Fungsi untuk mengupdate data
                //         }
                //     }
                // });


                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();
                    options.id = rowData.id;
                    $("#txtnama").val(rowData.nama);
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
