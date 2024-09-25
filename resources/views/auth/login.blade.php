<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="card max-w-[370px] w-full">
        <div class="p-3 text-center">
            <img class="mx-auto my-3 w-14"src="{{ asset('assets/images/sd-it-logo.png') }}" alt="sd-it-logo">
            <h1 class="font-bold text-sky-700 dark:text-white text-wrap">Sistem Informasi </h1>
            <h1 class="font-bold text-sky-700 dark:text-white text-wrap">SD IT AL-QUR'ANIYYAH </h1>
        </div>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5 p-10 card-body" id="sign_in_form">
            @csrf
            <div class="flex flex-col gap-1">
                <label class="text-gray-900 form-label">
                    Email
                </label>
                <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between gap-1">
                    <label class="text-gray-900 form-label">
                        Password
                    </label>
                    {{-- <a class="text-2sm link shrink-0"
                        href="html/demo1/authentication/classic/reset-password/enter-email.html">
                        Forgot Password?
                    </a> --}}
                </div>
                <label class="input" data-toggle-password="true">
                    <x-text-input id="password" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <button class="btn btn-icon" data-toggle-password-trigger="true">
                        <i class="text-gray-500 ki-filled ki-eye toggle-password-active:hidden">
                        </i>
                        <i class="hidden text-gray-500 ki-filled ki-eye-slash toggle-password-active:block">
                        </i>
                    </button>
                </label>
            </div>
            <label class="checkbox-group">
                <input class="checkbox checkbox-sm" name="check" type="checkbox" value="1" />
                <span class="checkbox-label">
                    Remember me
                </span>
            </label>
            <button type="submit" class="flex justify-center btn btn-primary grow">
                Sign In
            </button>
        </form>
    </div>
    <!-- Session Status -->

    {{-- <h3 class="mb-10 text-lg font-bold text-sky-700">Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
