<div class="w-full">
    <nav class="bg-gray-800 p-4 rounded-lg my-4 ml-2 items-center">
        <div class="container mx-auto flex flex-col h-screen">
            <!-- Logo -->
            <div class="lg:flex flex-col my-4">
                <h1 class="text-white text-sm lg:text-2xl font-bold text-center">WELCOME</h1>
                <h3 class="text-xs text-white lg:text-sm mb-4 text-center">{{ Auth::user()->name }}</h3>
            </div>
            <!-- Navigation Links -->
            <div class="flex flex-col space-y-3 text-xs lg:text-base">
                <a href="{{ route('dashboard') }}"
                    class="text-white flex items-center px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-home flex-none w-8"></i>
                    <span class="grow">Dashboard</span>
                </a>
                <a href="#" class="text-white flex items-center px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-user  flex-none w-8"></i>
                    <span class="grow">Teachers</span>
                </a>
                <a href="{{ route('jabatan') }}"
                    class="text-white flex items-center px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-tree  flex-none w-8"></i>
                    <span class="grow">Jabatan</span>
                </a>
                <a href="#" class="text-white flex items-center px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-users  flex-none w-8"></i>
                    <span class="grow">Students</span>
                </a>
                <a href="#" class="text-white flex items-center px-2 hover:bg-white hover:text-gray-800">
                    <i class="fa fa-book  flex-none w-8"></i>
                    <span class="grow">Cases</span>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-white flex items-center ">
                        <i class="fa fa-arrow-right flex-none w-8"></i>
                        <span class="grow">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>
