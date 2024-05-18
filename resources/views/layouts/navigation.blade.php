<!-- Navbar -->
<nav class="fixed flex flex-col justify-between w-4/12 h-screen bg-gray-800 shadow-lg lg:w-1/6">
    <!-- Logo -->
    <div class="py-4">
        <div class="mb-8 header">
            {{--  style="max-width:120px"  --}}
            <img class="w-12 mx-auto my-3 md:w-24"src="{{ asset('assets/images/sd-it-logo.png') }}" alt="sd-it-logo">
            <h3 class="text-white text-center text-[10px] md:text-sm text-bold">SDIT Al-Qur'aniyyah</h3>
        </div>

        <!-- Menu -->
        <ul class="flex flex-col items-center space-y-2 text-[10px] lg:text-base">
            {{-- dashboard --}}
            <li class="w-full px-2 md:px-3">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                    <i class="flex-none w-8 fa fa-home"></i>
                    <span class="grow">Dashboard</span>
                </a>
            </li>
            {{-- teacher --}}
            <li class="w-full px-2 md:px-3">
                <a href="{{ route('guru.index') }}"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                    <i class="flex-none w-8 fa fa-users"></i>
                    <span class="grow">Guru</span>
                </a>
            </li>
            {{-- jabatan --}}
            <li class="w-full px-2 md:px-3">
                <a href="{{ route('jabatan.index') }}"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                    <i class="flex-none w-8 fa fa-tree"></i>
                    <span class="grow">Jabatan</span>
                </a>
            </li>
            {{-- student --}}
            <li class="w-full px-2 md:px-3">
                <a href="#"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-student')">
                    <i class="flex-none w-8 fa fa-graduation-cap"></i>
                    <span class="grow">Menegement Siswa</span>
                </a>
                <ul class="hidden w-full pl-8 mt-1 space-y-1 nav-list-student">
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('siswa.index') }}">Data siswa</a>
                    </li>
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('kenaikanKelas') }}">Kenaikan kelas</a>
                    </li>
                </ul>
            </li>
            {{-- keterlambatan --}}
            <li class="w-full px-2 md:px-3">
                <a href="{{ route('keterlambatanguru.index') }}"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                    <i class="flex-none w-8 fa fa-clock"></i>
                    <span class="grow">Keterlambatan</span>
                </a>
            </li>
            {{-- kesalahan --}}
            <li class="w-full px-2 md:px-3">
                <a href="#"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-kesalahan')">
                    <i class="flex-none w-8 fa fa-layer-group"></i>
                    <span class="grow">Kesalahan</span>
                </a>

                <ul class="hidden w-full pl-8 mt-1 space-y-1 nav-list-kesalahan">
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('kesalahan-siswa.index') }}">Master</a>
                    </li>
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('detailkesalahan-siswa.index') }}">Detail</a>
                    </li>
                </ul>
            </li>
            {{-- prestasi --}}
            <li class="w-full px-2 md:px-3">
                <a href="#"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-prestasi')">
                    <i class="flex-none w-8 fa fa-trophy"></i>
                    <span class="grow">Prestasi</span>
                </a>

                <ul class="hidden w-full pl-8 mt-1 space-y-1 nav-list-prestasi">
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('prestasi-siswa.index') }}">Master</a>
                    </li>
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('detailprestasi-siswa.index') }}">Detail</a>
                    </li>
                </ul>
            </li>
            {{-- profile --}}
            <li class="w-full px-2 md:px-3">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                    <i class="flex-none w-8 fa fa-user"></i>
                    <span class="grow">Profile</span>
                </a>
            </li>
            {{-- menegement users --}}
            <li class="w-full px-2 md:px-3">
                <a href="#"
                    class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-menegement-users')">
                    <i class="flex-none w-8 fa fa-user"></i>
                    <span class="grow">Menegement users</span>
                </a>
                <ul class="hidden w-full pl-8 mt-1 space-y-1 nav-list-menegement-users">
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('user.index') }}">User</a>
                    </li>
                    <li
                        class="flex items-center justify-between px-0 text-white md:px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('roles.index') }}">Role</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Footer -->
    <div class="py-2 text-[10px] lg:text-base">
        <form action="{{ route('logout') }}" method="post" class="w-full px-0 mb-4 md:px-3">
            @csrf
            <button type="submit" class="flex items-center justify-between px-0 text-white md:px-2">
                <i class="flex-none w-8 fa fa-arrow-right"></i>
                <span class="grow">Logout</span>
            </button>
        </form>
        <p class="text-[8px] md:text-[12px] text-gray-600 text-center">© 2024 SD IT Al-Qur'aniyyah</p>
    </div>

</nav>
