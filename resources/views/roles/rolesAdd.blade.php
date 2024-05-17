@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('roles.index') }}">ROLES</a></span>->Form roles</h1>

        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md ">
            @if (session('msg'))
                <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1 mx-3">
                            <i class="fa fa-exclamation"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold lg:text-base">Perhatian</p>
                            <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('roles.store') }}" method="post" class="flex justify-center"
                onsubmit="return confirm('apa anda yakin??')">
                <div class="flex flex-col justify-center mt-2 w-[30rem]">
                    @csrf
                    <div class="flex flex-col my-3">
                        <label for="txtroles" class="text-xs lg:text-sm">Masukan Role</label>
                        <input type="text" name="txtroles" id="txtroles" required autocomplete="off" autofocus
                            class="text-xs rounded lg:text-sm" maxlength="100">
                    </div>
                    @foreach ($permissions as $permission)
                        <div class="flex flex-row mx-1 my-1">
                            <input type="checkbox" name="permissions[]" id="{{ $permission->id }}"
                                value="{{ $permission->id }}" class="mx-2 text-xs rounded lg:text-sm">
                            <label for="{{ $permission->id }}"
                                class="text-xs lg:text-sm hover:text-sky-500">{{ $permission->name }}</label>
                        </div>
                    @endforeach

                    <div class="flex flex-row justify-center mt-2">
                        <button type="button"
                            class="w-20 p-2 mx-1 mt-2 text-xs text-white rounded-md bg-slate-500 hover:bg-slate-800 lg:text-sm"
                            onclick="window.location.href = '{{ route('roles.index') }}'">Kembali</button>
                        <button type="submit"
                            class="w-20 p-2 mx-1 mt-2 text-xs text-white rounded-md bg-sky-500 hover:bg-sky-800 lg:text-sm">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
