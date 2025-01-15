<div class="fixed top-0 bottom-0 z-20 flex-col items-stretch hidden border-r sidebar dark:bg-coal-600 bg-light border-r-gray-200 dark:border-r-coal-100 lg:flex shrink-0"
    data-drawer="true" data-drawer-class="top-0 bottom-0 drawer drawer-start" data-drawer-enable="true|lg:false"
    id="sidebar">
    <div class="relative items-center justify-between hidden px-3 sidebar-header lg:flex lg:px-6 shrink-0"
        id="sidebar_header">
        <a class="hidden dark:block" href="{{ route('dashboard') }}">
            <img class="default-logo min-h-[22px] max-w-none"
                src="{{ asset('plugins/assets/media/app/default-logo-dark.svg') }}" />
            <img class="small-logo min-h-[22px] max-w-none"
                src="{{ asset('plugins/assets/media/app/mini-logo.svg') }}" />
        </a>
        <button
            class="btn btn-icon btn-icon-md size-[30px] rounded-lg border border-gray-200 dark:border-gray-300 bg-light text-gray-500 hover:text-gray-700 toggle absolute left-full top-2/4 -translate-x-2/4 -translate-y-2/4"
            data-toggle="body" data-toggle-class="sidebar-collapse" id="sidebar_toggle">
            <i class="transition-all duration-300 ki-filled ki-black-left-line toggle-active:rotate-180">
            </i>
        </button>
    </div>
    <div class="flex py-5 pr-2 sidebar-content grow shrink-0" id="sidebar_content">
        <div class="flex pl-2 pr-1 scrollable-y-hover grow shrink-0 lg:pl-5 lg:pr-3" data-scrollable="true"
            data-scrollable-dependencies="#sidebar_header" data-scrollable-height="auto" data-scrollable-offset="0px"
            data-scrollable-wrappers="#sidebar_content" id="sidebar_scrollable">
            <div class="menu flex flex-col grow gap-0.5" data-menu="true" data-menu-accordion-expand-all="false"
                id="sidebar_menu">
                <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                    <a class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                        href="{{ route('dashboard') }}" tabindex="0">
                        <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                            <i class="text-lg ki-filled ki-element-11">
                            </i>
                        </span>
                        <span
                            class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                            Dashboards
                        </span>
                    </a>
                </div>

                @canany(['kelas.list', 'kelas.create', 'kelas.edit', 'kelas.delete', 'guru.list', 'guru.create',
                    'guru.edit', 'guru.delete', 'guru.import', 'jabatan.list', 'jabatan.create', 'jabatan.edit',
                    'jabatan.delete', 'jabatan.import', 'siswa.list', 'siswa.create', 'siswa.edit', 'siswa.delete',
                    'siswa.kenaikan-kelas', 'prestasi-siswa.list', 'prestasi-siswa.create', 'prestasi-siswa.edit',
                    'prestasi-siswa.delete', 'kesalahan-siswa.list', 'kesalahan-siswa.create', 'kesalahan-siswa.edit',
                    'kesalahan-siswa.delete'])
                    <div class="menu-item pt-2.25 pb-px">
                        <span class="menu-heading uppercase pl-[10px] pr-[10px] text-2sm font-semibold text-gray-500">
                            Management Data
                        </span>
                    </div>
                @endcanany
                @canany(['kelas.list', 'kelas.create', 'kelas.edit', 'kelas.delete'])
                    <div class="menu-item">
                        <a href="{{ route('kelas.index') }}"
                            class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                            tabindex="0">
                            <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                <i class="ki-filled ki-technology-3"></i>
                            </span>
                            <span
                                class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                Kelas
                            </span>
                        </a>
                    </div>
                @endcanany

                @canany(['guru.list', 'guru.create', 'guru.edit', 'guru.delete', 'guru.import', 'jabatan.list',
                    'jabatan.create', 'jabatan.edit', 'jabatan.delete', 'jabatan.import'])
                    <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                        <div class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                            tabindex="0">
                            <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                <i class="text-lg ki-filled ki-teacher">
                                </i>
                            </span>
                            <span
                                class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                Guru
                            </span>
                            <span class="menu-arrow text-gray-400 w-[20px] shrink-0 justify-end ml-1 mr-[-10px]">
                                <i class="ki-filled ki-plus text-2xs menu-item-show:hidden">
                                </i>
                                <i class="hidden ki-filled ki-minus text-2xs menu-item-show:inline-flex">
                                </i>
                            </span>
                        </div>
                        <div
                            class="menu-accordion gap-0.5 pl-[10px] relative before:absolute before:left-[20px] before:top-0 before:bottom-0 before:border-l before:border-gray-200">
                            <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                                @canany(['jabatan.list', 'jabatan.create', 'jabatan.edit', 'jabatan.delete',
                                    'jabatan.import'])
                                    <a href="{{ route('jabatan.index') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            Jabatan
                                        </span>
                                    </a>
                                @endcanany
                                @canany(['guru.list', 'guru.create', 'guru.edit', 'guru.delete', 'guru.import'])
                                    <a href="{{ route('guru.index') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            List Guru
                                        </span>
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany

                @canany(['siswa.list', 'siswa.create', 'siswa.edit', 'siswa.delete', 'siswa.kenaikan-kelas',
                    'prestasi-siswa.list', 'prestasi-siswa.create', 'prestasi-siswa.edit', 'prestasi-siswa.delete',
                    'kesalahan-siswa.list', 'kesalahan-siswa.create', 'kesalahan-siswa.edit', 'kesalahan-siswa.delete'])
                    <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                        <div class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                            tabindex="0">
                            <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                <i class="ki-filled ki-people"></i>
                            </span>
                            <span
                                class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                Siswa
                            </span>
                            <span class="menu-arrow text-gray-400 w-[20px] shrink-0 justify-end ml-1 mr-[-10px]">
                                <i class="ki-filled ki-plus text-2xs menu-item-show:hidden">
                                </i>
                                <i class="hidden ki-filled ki-minus text-2xs menu-item-show:inline-flex">
                                </i>
                            </span>
                        </div>
                        <div
                            class="menu-accordion gap-0.5 pl-[10px] relative before:absolute before:left-[20px] before:top-0 before:bottom-0 before:border-l before:border-gray-200">
                            <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                                @canany(['siswa.list', 'siswa.create', 'siswa.edit', 'siswa.delete',
                                    'siswa.kenaikan-kelas'])
                                    <a href="{{ route('siswa.index') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            List Siswa
                                        </span>
                                    </a>
                                    <a href="{{ route('siswa.kenaikan') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            Kenaikan Siswa
                                        </span>
                                    </a>
                                @endcanany
                                @canany(['prestasi-siswa.list', 'prestasi-siswa.create', 'prestasi-siswa.edit',
                                    'prestasi-siswa.delete'])
                                    <a href="{{ route('prestasi-siswa.index') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            Prestasi Siswa
                                        </span>
                                    </a>
                                @endcanany
                                @canany(['kesalahan-siswa.list', 'kesalahan-siswa.create', 'kesalahan-siswa.edit',
                                    'kesalahan-siswa.delete'])
                                    <a href="{{ route('kesalahan-siswa.index') }}"
                                        class="menu-link border border-transparent gap-[14px] pl-[10px] pr-[10px] py-[8px] grow cursor-pointer"
                                        tabindex="0">
                                        <span
                                            class="menu-bullet flex w-[6px] relative before:absolute before:top-0 before:size-[6px] before:rounded-full before:-translate-x-1/2 before:-translate-y-1/2 menu-item-active:before:bg-primary menu-item-hover:before:bg-primary">
                                        </span>
                                        <span
                                            class="menu-title text-2sm font-medium mr-1 text-gray-700 menu-item-active:text-primary menu-item-active:font-semibold menu-link-hover:!text-primary">
                                            Kesalahan Siswa
                                        </span>
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany

                @canany(['detailprestasi-siswa.list', 'detailprestasi-siswa.create', 'detailprestasi-siswa.edit',
                    'detailprestasi-siswa.delete', 'detailkesalahan-siswa.list', 'detailkesalahan-siswa.create',
                    'detailkesalahan-siswa.edit', 'detailkesalahan-siswa.delete'])
                    <div class="menu-item pt-2.25 pb-px">
                        <span class="menu-heading uppercase pl-[10px] pr-[10px] text-2sm font-semibold text-gray-500">
                            Management Kesiswaan
                        </span>
                    </div>
                    <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                        @canany(['detailprestasi-siswa.list', 'detailprestasi-siswa.create', 'detailprestasi-siswa.edit',
                            'detailprestasi-siswa.delete'])
                            <a href="{{ route('detailprestasi-siswa.index') }}"
                                class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                                tabindex="0">
                                <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                    <i class="text-lg ki-filled ki-graph-up">
                                    </i>
                                </span>
                                <span
                                    class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                    Prestasi Siswa
                                </span>
                            </a>
                        @endcanany
                        @canany(['detailkesalahan-siswa.list', 'detailkesalahan-siswa.create', 'detailkesalahan-siswa.edit',
                            'detailkesalahan-siswa.delete'])
                            <a href="{{ route('detailkesalahan-siswa.index') }}"
                                class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                                tabindex="0">
                                <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                    <i class="text-lg ki-filled ki-book-square">
                                    </i>
                                </span>
                                <span
                                    class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                    Pelanggaran Siswa
                                </span>
                            </a>
                        @endcanany
                    </div>
                @endcanany


                @canany(['user.list', 'user.create', 'user.edit', 'user.delete', 'roles.list', 'roles.create',
                    'roles.edit'])
                    <div class="menu-item pt-2.25 pb-px">
                        <span class="menu-heading uppercase pl-[10px] pr-[10px] text-2sm font-semibold text-gray-500">
                            Management User
                        </span>
                    </div>
                @endcanany
                @canany(['user.list', 'user.create', 'user.edit', 'user.delete'])
                    <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                        <a href="{{ route('user.index') }}"
                            class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                            tabindex="0">
                            <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                <i class="text-lg ki-filled ki-profile-circle">
                                </i>
                            </span>
                            <span
                                class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                Users
                            </span>
                        </a>
                    </div>
                @endcanany
                @canany(['roles.list', 'roles.create', 'roles.edit'])
                    <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                        <a href="{{ route('roles.index') }}"
                            class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                            tabindex="0">
                            <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                                <i class="text-lg ki-filled ki-security-user">
                                </i>
                            </span>
                            <span
                                class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                                Role Users
                            </span>
                        </a>
                    </div>
                @endcanany
                <div class="menu-item pt-2.25 pb-px">
                    <span class="menu-heading uppercase pl-[10px] pr-[10px] text-2sm font-semibold text-gray-500">
                        Lainnya
                    </span>
                </div>
                <div class="menu-item" data-menu-item-toggle="accordion" data-menu-item-trigger="click">
                    <a href="{{ route('absen-guru.index') }}"
                        class="menu-link flex items-center grow cursor-pointer border border-transparent gap-[10px] pl-[10px] pr-[10px] py-[6px]"
                        tabindex="0">
                        <span class="menu-icon items-start text-gray-500 dark:text-gray-400 w-[20px]">
                            <i class="text-lg ki-filled ki-fingerprint-scanning">
                            </i>
                        </span>
                        <span
                            class="menu-title text-sm font-semibold text-gray-700 menu-item-active:text-primary menu-link-hover:!text-primary">
                            Absensi
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
