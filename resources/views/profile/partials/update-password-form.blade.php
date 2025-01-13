<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-700">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang minimal 8 character dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Password Lama')" />
            <div class="relative">
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="block w-full pr-10 mt-1" autocomplete="current-password" />
                <button type="button" onclick="togglePassword('update_password_current_password')"
                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 dark:text-gray-400">
                    👁️
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="update_password_password" :value="__('Password Baru')" />
            <div class="relative">
                <x-text-input id="update_password_password" name="password" type="password"
                    class="block w-full pr-10 mt-1" autocomplete="new-password" />
                <button type="button" onclick="togglePassword('update_password_password')"
                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 dark:text-gray-400">
                    👁️
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="block w-full pr-10 mt-1" autocomplete="new-password" />
                <button type="button" onclick="togglePassword('update_password_password_confirmation')"
                    class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 dark:text-gray-400">
                    👁️
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password telah di rubah pastikan anda mengingatnya !!')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
