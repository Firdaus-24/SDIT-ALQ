@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <span class="flex flex-col">
            <h1 class="text-2xl lg:text-4xl text-bold mb-3 dark:text-white">DASHBOARD</h1>
            <h3 class="font-bold text-xs lg:text-sm mb-4 dark:text-white">Hi... {{ Auth::user()->name }}</h3>
        </span>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-white p-4 shadow-md rounded-lg col-span-2">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Guru Aktif</h2>
                <p class="text-gray-500">Total : {{ $teacher }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg col-span-2">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Guru Nonaktif</h2>
                <p class="text-gray-500">Total : {{ $teacherOff }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Murid</h2>
                <p class="text-gray-500">Total Murid Aktif : {{ $student }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Laki - Laki</h2>
                <p class="text-gray-500">Total : {{ $studentLaki }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Perempuan</h2>
                <p class="text-gray-500">Total : {{ $studentPerempuan }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Alumni</h2>
                <p class="text-gray-500">Total : {{ $alumni }}</p>
            </div>
        </div>
    </div>
@endsection
