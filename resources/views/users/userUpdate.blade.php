@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('user') }}">USER</a></span>->Form update user</h1>
        @if (session('msg'))
            <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Success</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('userUpdate', ['id' => $user->id]) }}"
            class="w-full p-2 mx-auto rounded-lg md:w-1/2"
            onsubmit="return confirm('anda yakin untuk mengupdate user ini?')">
            @csrf
            <!-- Name -->
            <div class="mt-3">
                <label class="text-xs dark:text-white lg:text-sm" for="name">Name</label>
                <input type="text" name="name" id="name"
                    class="block w-full mt-1 bg-transparent rounded dark:text-white" value="{{ $user->name }}" required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="text-xs dark:text-white lg:text-sm" for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="block w-full mt-1 bg-transparent rounded dark:text-white" value="{{ $user->email }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="text-xs dark:text-white lg:text-sm" for="password">Password</label>
                <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                    autocomplete="new-password" placeholder="kosongkan jika tidak ingin ganti password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="text-xs dark:text-white lg:text-sm" for="password_confirmation">Confirm Password</label>
                <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Role -->
            <div class="mt-4">
                <label class="text-xs dark:text-white lg:text-sm" for="role">Role</label>
                <select id="role" name="role"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Pilih</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ in_array($role->name, $roleNames->toArray()) ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- status user -->
            <div class="mt-4">
                <label class="text-xs dark:text-white lg:text-sm" for="status">Status</label>

                <select id="status" name="status"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required>
                    <option value="">Pilih</option>
                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Non Aktif</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
