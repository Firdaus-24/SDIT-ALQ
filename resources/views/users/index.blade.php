@extends('layouts.backend.dashboard.app')

@section('container')
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Users
            </h1>
        </div>
        <div class="grid">
            <div class="min-w-full card card-grid">
                <div class="flex-wrap py-5 card-header">
                    <h3 class="card-title">
                        Daftar Users
                    </h3>
                    <div class="flex justify-end">
                        @if (auth()->user()->hasPermissionTo('user.create'))
                            <x-primary-button type="button" id="btn-add" data-modal-toggle="#modalUser">
                                <i class="ki-outline ki-plus-squared">
                                </i>
                                Tambah
                            </x-primary-button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-4 scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="tableUser">
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
                                                email
                                            </span>
                                            <span class="sort-icon">
                                            </span>
                                        </span>
                                    </th>
                                    <th class="w-[200px]">
                                        <span class="sort">
                                            <span class="sort-label">
                                                Role
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
    <x-modal id="modalUser" modalTitle="Form Tambah Pengguna Baru" modalSize="medium">
        <form action="" id="user-form">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                <div class="flex flex-shrink-0 w-32 gap-1">
                    <x-input-label>
                        Nama
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                </div>
                <x-text-input name="id" id="id" type="hidden" value="" autocomplete="off"
                    maxlength="100"></x-text-input>
                <x-text-input name="nama" id="nama" type="text" autocomplete="off" maxlength="255"
                    required></x-text-input>
            </div>
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                <div class="flex flex-shrink-0 w-32 gap-1">
                    <x-input-label>
                        Email
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                </div>
                <x-text-input name="email" id="email" type="email" autocomplete="off" maxlength="255"
                    required></x-text-input>
            </div>
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                <div class="flex flex-shrink-0 w-32 gap-1">
                    <x-input-label>
                        Password
                    </x-input-label>
                    <span class="text-danger">*</span>
                </div>
                <div class="relative flex-1">
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full pr-10" />
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 password"
                        data-toggle-password-trigger="true">
                        <i class="ki-filled ki-eye toggle-password-active:hidden"></i>
                        <i class="hidden ki-filled ki-eye-slash toggle-password-active:block"></i>
                    </button>
                </div>
            </div>
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                <div class="flex flex-shrink-0 w-32 gap-1">
                    <x-input-label>
                        Ulangi Password
                    </x-input-label>
                    <span class="text-danger">*</span>
                </div>
                <div class="relative flex-1">
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="current-password" class="w-full pr-10" />
                    <button type="button"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 confirm-password"
                        data-toggle-password-trigger="true">
                        <i class="ki-filled ki-eye toggle-password-active:hidden"></i>
                        <i class="hidden ki-filled ki-eye-slash toggle-password-active:block"></i>
                    </button>
                </div>
            </div>
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-3">
                <div class="flex flex-shrink-0 w-32 gap-1">
                    <x-input-label>
                        Tipe Role
                    </x-input-label>
                    <span class="text-danger">
                        *
                    </span>
                </div>
                <select name="role" id="role" class="select" required>
                    <option value="">Pilih</option>
                    @foreach ($roles as $p)
                        <option value="{{ $p->name }}">
                            {{ $p->name }}
                        </option>
                    @endforeach
                </select>
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
            let modal = 'modalUser';
            let formMain = 'user-form';
            let dataTableList;
            let options = {
                url: null,
                form: null,
                id: null,
                datatable: null,
                dataTitle: "User",
            }


            $(document).ready(function() {
                // data table
                dataTableList = $('#tableUser').DataTable({
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
                        url: "{!! route('user.list') !!}",
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
                            data: 'email',
                            name: 'email',
                            orderable: true,
                        },
                        {
                            data: 'role',
                            name: 'role',
                            orderable: false,
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
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
                    baseUrl: '/user',
                    methodOverride: true,
                });


                $(document).on('click', '.btn-edit', function() {
                    openModal(modal)
                    let rowData = dataTableList.row($(this).closest('tr')).data();

                    let parser = new DOMParser();
                    let doc = parser.parseFromString(rowData.nama, 'text/html');

                    // Cari elemen <p> dan ambil teksnya
                    let text = nama ? doc.querySelector('p').textContent.trim() :
                        '-';
                    $("#id").val(rowData.id);
                    $("#nama").val(text);
                    $("#email").val(rowData.email);
                    $("#role").val(rowData.role);
                });

                $(document).on('click', '#btn-delete', function() {
                    let rowData = dataTableList.row($(this).parents('tr')).data()
                    options.url = `/user/${rowData.id}`;
                    options.id = rowData.id;
                    options.dataTable = dataTableList;

                    DELETE_DATA(options)
                })

                $('.password').on('click', function() {
                    LIHAT_PASSWORD('password');
                });
                $('.confirm-password').on('click', function() {
                    LIHAT_PASSWORD('password_confirmation');
                });
            });

            const LIHAT_PASSWORD = (id) => {
                const $passwordInput = $(`#${id}`);
                const $toggleIconEye = $(this).find('.ki-eye');
                const $toggleIconEyeSlash = $(this).find('.ki-eye-slash');

                // Toggle input type
                const isPassword = $passwordInput.attr('type') === 'password';
                $passwordInput.attr('type', isPassword ? 'text' : 'password');

                // Toggle icons
                $toggleIconEye.toggleClass('hidden', !isPassword);
                $toggleIconEyeSlash.toggleClass('hidden', isPassword);
            }
        </script>
    @endpush
@endsection
