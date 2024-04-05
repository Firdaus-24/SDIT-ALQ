<!-- Navbar -->
<nav class="bg-gray-800 w-4/12 lg:w-1/6 h-screen fixed top-0 left-0 flex flex-col justify-between shadow-lg">
    <!-- Logo -->
    <div class="py-4">
        <div class="header mb-8">
            {{--  style="max-width:120px"  --}}
            <img class="w-20 md:w-24 mx-auto mt-3"src="{{ asset('assets/images/sd-it-logo.png') }}" alt="sd-it-logo">
            <h3 class="text-white text-center text-xs lg:text-sm text-bold">SDIT Al-Qur'aniyyah</h3>
        </div>

        <!-- Menu -->
        <ul class="flex flex-col items-center space-y-2 text-sm lg:text-base">
            {{-- dashboard --}}
            <li class="w-full px-3">
                <a href="{{ route('dashboard') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-home flex-none w-8"></i>
                    <span class="grow">Dashboard</span>
                </a>
            </li>
            {{-- teacher --}}
            <li class="w-full px-3">
                <a href="{{ route('teachers') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-user  flex-none w-8"></i>
                    <span class="grow">Guru</span>
                </a>
            </li>
            {{-- jabatan --}}
            <li class="w-full px-3">
                <a href="{{ route('jabatan') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-tree  flex-none w-8"></i>
                    <span class="grow">Jabatan</span>
                </a>
            </li>
            {{-- student --}}
            <li class="w-full px-3">
                <a href="{{ route('student') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-users  flex-none w-8"></i>
                    <span class="grow">Siswa</span>
                </a>
            </li>
            {{-- keterlambatan --}}
            <li class="w-full px-3">
                <a href="{{ route('keterlambatan') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-clock flex-none w-8"></i>
                    <span class="grow">Keterlambatan</span>
                </a>
            </li>
            {{-- kesalahan --}}
            <li class="w-full px-3">
                <a href="#"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-kesalahan')">
                    <i class="fa fa-layer-group flex-none w-8"></i>
                    <span class="grow">Kesalahan</span>
                </a>

                <ul class="w-full pl-8 space-y-1 mt-1 hidden nav-list-kesalahan">
                    <li class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('kesalahan') }}">Master</a>
                    </li>
                    <li class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('kesalahanDetail') }}">Detail</a>
                    </li>
                </ul>
            </li>
            {{-- prestasi --}}
            <li class="w-full px-3">
                <a href="#"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800"
                    onclick="openListNavbar('nav-list-prestasi')">
                    <i class="fa fa-trophy flex-none w-8"></i>
                    <span class="grow">Prestasi</span>
                </a>

                <ul class="w-full pl-8 space-y-1 mt-1 hidden nav-list-prestasi">
                    <li class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('prestasi') }}">Master</a>
                    </li>
                    <li class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                        <a href="{{ route('prestasiDetail') }}">Detail</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Footer -->
    <div class="py-4">
        <form action="{{ route('logout') }}" method="post" class="w-full px-3">
            @csrf
            <button type="submit" class="text-white flex items-center justify-between">
                <i class="fa fa-arrow-right flex-none w-8"></i>
                <span class="grow">Logout</span>
            </button>
        </form>
        <p class="text-sm text-gray-600 text-center">© 2024 SD IT Al-Qur'aniyyah</p>
    </div>

</nav>

<script>
    const openListNavbar = (id) => {
        $(`.${id}`).toggle('show');
    }
</script>
