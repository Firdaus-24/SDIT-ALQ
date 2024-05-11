@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <span class="flex flex-col">
            <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">DASHBOARD</h1>
            <h3 class="mb-4 text-xs font-bold lg:text-sm dark:text-white">Hi... {{ Auth::user()->name }}</h3>
        </span>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="col-span-2 p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Guru Aktif</h2>
                <p class="text-gray-500">Total : {{ $teacher }}</p>
            </div>
            <!-- Card 2 -->
            <div class="col-span-2 p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Guru Nonaktif</h2>
                <p class="text-gray-500">Total : {{ $teacherOff }}</p>
            </div>
            <!-- Card 2 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Murid</h2>
                <p class="text-gray-500">Total Murid Aktif : {{ $student }}</p>
            </div>
            <!-- Card 2 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Laki - Laki</h2>
                <p class="text-gray-500">Total : {{ $studentLaki }}</p>
            </div>
            <!-- Card 2 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Perempuan</h2>
                <p class="text-gray-500">Total : {{ $studentPerempuan }}</p>
            </div>
            <!-- Card 2 -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="mb-2 text-sm font-bold lg:text-lg">Alumni</h2>
                <p class="text-gray-500">Total : {{ $alumni }}</p>
            </div>
        </div>
    </div>
@endsection
