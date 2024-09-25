@extends('layouts.backend.dashboard.app')

@section('container')
    {{-- <div class="container mx-2 lg:mx-0">
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
    </div> --}}
    <!-- begin: container -->
    <div class="container-fixed">
        <div class="flex flex-col items-center gap-2 lg:gap-3.5 py-4 lg:pt-5 lg:pb-10">
            <img class="rounded-full border-3 border-success size-[100px] shrink-0"
                src="{{ asset('assets/images/nophoto.jpg') }}" />
            <div class="flex items-center gap-1.5">
                <div class="text-lg font-semibold leading-5 text-gray-900">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-1 lg:gap-4.5 text-sm">
                <div class="flex gap-1.25 items-center">
                    <i class="text-sm text-gray-500 ki-filled ki-abstract">
                    </i>
                    <span class="text-gray-600">
                        Member
                    </span>
                </div>
                <div class="flex gap-1.25 items-center">
                    <i class="text-sm text-gray-500 ki-filled ki-geolocation">
                    </i>
                    <span class="text-gray-600">
                        Pd. Aren Tangerang
                    </span>
                </div>
                <div class="flex gap-1.25 items-center">
                    <i class="text-sm text-gray-500 ki-filled ki-sms">
                    </i>
                    <a class="text-gray-600 hover:text-primary" href="mailto: {{ Auth::user()->email }}">
                        {{ Auth::user()->email }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- begin: container -->
    <div class="my-5 container-fixed">
        <!-- begin: grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-1">
                <div class="grid gap-5 lg:gap-7.5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                General Info
                            </h3>
                        </div>
                        <div class="card-body pt-3.5 pb-3.5">
                            <table class="table-auto">
                                <tbody>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Phone:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            +62 XXX XXX XXX
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Email:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            {{ Auth::user()->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Status:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            @if (Auth::user()->is_active == 1)
                                                <span class="badge badge-sm badge-success badge-outline">
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge badge-sm badge-danger badge-outline">
                                                    Off
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Encryption:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            Strong
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Created at:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            {{ Auth::user()->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pb-3 text-sm font-medium text-gray-500 pe-4 lg:pe-8">
                                            Update at:
                                        </td>
                                        <td class="pb-3 text-sm font-medium text-gray-800">
                                            {{ Auth::user()->updated_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="flex flex-col gap-5 lg:gap-7.5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Recent Activity
                                </h3>
                                <div class="flex items-center gap-2">
                                    <label class="switch">
                                        <span class="switch-label">
                                            Auto refresh:
                                            <span class="switch-on:hidden">
                                                Off
                                            </span>
                                            <span class="hidden switch-on:inline">
                                                On
                                            </span>
                                        </span>
                                        <input checked="" name="check" type="checkbox" value="1" />
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex flex-col">
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-people">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-800">
                                                    {{ auth::user()->name }} sent an
                                                    <a class="text-sm font-medium link" href="#">
                                                        inquiry
                                                    </a>
                                                    about a
                                                    <a class="text-sm font-medium link" href="#">
                                                        new product
                                                    </a>
                                                    .
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    Today, 9:00 AM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-calendar-tick">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col pb-2.5">
                                                <span class="text-sm font-medium text-gray-700">
                                                    {{ auth::user()->name }} attended a webinar on new product features.
                                                </span>
                                                <span class="text-xs font-medium text-gray-500">
                                                    3 days ago, 11:45 AM
                                                </span>
                                            </div>
                                            <div class="p-4 shadow-none card">
                                                <div class="flex flex-wrap gap-2.5">
                                                    <i class="text-lg ki-filled ki-code text-info">
                                                    </i>
                                                    <div class="flex flex-col gap-5 grow">
                                                        <div class="flex flex-wrap items-center justify-between">
                                                            <div class="flex flex-col gap-0.5">
                                                                <span
                                                                    class="mb-px font-semibold text-gray-900 cursor-pointer text-md hover:text-primary">
                                                                    Leadership Development Series: Part 1
                                                                </span>
                                                                <span class="text-xs font-medium text-gray-500">
                                                                    The first installment of a leadership development
                                                                    series.
                                                                </span>
                                                            </div>
                                                            <a class="btn btn-link"
                                                                href="html/demo1/account/members/teams.html">
                                                                View
                                                            </a>
                                                        </div>
                                                        <div class="flex flex-wrap gap-7.5">
                                                            <div class="flex items-center gap-1.5">
                                                                <span class="font-medium text-gray-500 text-2sm">
                                                                    Code:
                                                                </span>
                                                                <a class="font-semibold text-2sm text-primary"
                                                                    href="#">
                                                                    #leaderdev-1
                                                                </a>
                                                            </div>
                                                            <div class="flex items-center gap-1.5">
                                                                <span class="font-medium text-gray-500 text-2sm">
                                                                    Progress:
                                                                </span>
                                                                <div class="progress progress-success min-w-[120px]">
                                                                    <div class="progress-bar" style="width: 80%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex items-center gap-1.5 lg:min-w-24 shrink-0 max-w-auto">
                                                                <span class="font-medium text-gray-500 text-2sm">
                                                                    Guests:
                                                                </span>
                                                                <div class="flex -space-x-2">
                                                                    <div class="flex">
                                                                        <img class="relative rounded-full hover:z-5 shrink-0 ring-1 ring-light-light size-7"
                                                                            src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                    </div>
                                                                    <div class="flex">
                                                                        <img class="relative rounded-full hover:z-5 shrink-0 ring-1 ring-light-light size-7"
                                                                            src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                    </div>
                                                                    <div class="flex">
                                                                        <img class="relative rounded-full hover:z-5 shrink-0 ring-1 ring-light-light size-7"
                                                                            src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                                    </div>
                                                                    <div class="flex">
                                                                        <span
                                                                            class="relative inline-flex items-center justify-center font-semibold leading-none rounded-full hover:z-5 shrink-0 ring-1 text-3xs size-7 text-primary-inverse ring-primary-light bg-primary">
                                                                            +24
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-entrance-left">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-800">
                                                    {{ auth::user()->name }}'s last login to the
                                                    <a class="text-sm font-medium link" href="#">
                                                        Customer Portal
                                                    </a>
                                                    .
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    5 days ago, 4:07 PM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="absolute bottom-0 left-0 translate-x-1/2 border-l w-9 top-9 border-l-gray-300">
                                        </div>
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-directbox-default">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 mb-7 text-md grow">
                                            <div class="flex flex-col pb-2.5">
                                                <span class="text-sm font-medium text-gray-800">
                                                    Email campaign sent to {{ auth::user()->name }} for a special
                                                    promotion.
                                                </span>
                                                <span class="text-xs font-medium text-gray-500">
                                                    1 week ago, 11:45 AM
                                                </span>
                                            </div>
                                            <div class="shadow-none card">
                                                <div class="card-body lg:py-4">
                                                    <div class="flex justify-center">
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        <div class="font-semibold text-center text-gray-900 text-md">
                                                            First Campaign Created
                                                        </div>
                                                        <div class="flex items-center justify-center gap-1">
                                                            <a class="font-semibold text-2sm link"
                                                                href="html/demo1/public-profile/profiles/company.html">
                                                                Axio new release
                                                            </a>
                                                            <span class="mr-2 font-medium text-gray-600 text-2sm">
                                                                email campaign
                                                            </span>
                                                            <span class="badge badge-sm badge-success badge-outline">
                                                                Public
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div
                                            class="flex items-center justify-center text-gray-600 bg-gray-100 border border-gray-300 rounded-full shrink-0 size-9">
                                            <i class="text-base ki-filled ki-rocket">
                                            </i>
                                        </div>
                                        <div class="pl-2.5 text-md grow">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-medium text-gray-800">
                                                    Explored niche demo ideas for product-specific solutions.
                                                </div>
                                                <span class="text-xs font-medium text-gray-500">
                                                    3 weeks ago, 4:07 PM
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-center card-footer">
                                <a class="btn btn-link" href="html/demo1/public-profile/activity.html">
                                    All-time Activities
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end: grid -->
    </div>
    <!-- end: container -->
@endsection
