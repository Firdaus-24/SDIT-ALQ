<!-- Navbar -->
<nav class="bg-gray-800 w-4/12 lg:w-1/6 h-screen fixed top-0 left-0 flex flex-col justify-between shadow-lg">
    <!-- Logo -->
    <div class="py-4">
        <div class="header mb-8">
            <h1 class="text-white text-sm lg:text-2xl font-bold text-center">WELCOME</h1>
            <h3 class="text-xs text-white lg:text-sm mb-4 text-center">{{ Auth::user()->name }}</h3>
        </div>

        <!-- Menu -->
        <ul class="flex flex-col items-center space-y-2 text-sm lg:text-base">
            <li class="w-full px-3">
                <a href="{{ route('dashboard') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-home flex-none w-8"></i>
                    <span class="grow">Dashboard</span>
                </a>
            </li>
            <li class="w-full px-3">
                <a href="{{ route('teachers') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-user  flex-none w-8"></i>
                    <span class="grow">Teachers</span>
                </a>
            </li>
            <li class="w-full px-3">
                <a href="{{ route('jabatan') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-tree  flex-none w-8"></i>
                    <span class="grow">Jabatan</span>
                </a>
            </li>
            <li class="w-full px-3">
                <a href="{{ route('student') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-users  flex-none w-8"></i>
                    <span class="grow">Students</span>
                </a>
            </li>
            <li class="w-full px-3">
                <a href="{{ route('keterlambatan') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-clock flex-none w-8"></i>
                    <span class="grow">Keterlambatan</span>
                </a>
            </li>
            <li class="w-full px-3">
                <a href="{{ route('student') }}"
                    class="text-white flex items-center justify-between px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-bars flex-none w-8"></i>
                    <span class="grow">Setting</span>
                </a>
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
