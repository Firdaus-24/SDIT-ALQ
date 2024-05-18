@extends('layouts.app')

@section('container')
    <div class="container mx-2 lg:mx-0">
        <x-slot name="header" class="mt-3">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Profile') }}
            </h2>
        </x-slot>
        <div class="py-12 mt-3">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                @if (session('status'))
                    <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                        role="alert">
                        <div class="flex">
                            <div class="py-1 mx-3">
                                <i class="fa fa-exclamation"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold lg:text-base">Success</p>
                                <p class="text-xs lg:text-sm">{{ session('status') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
