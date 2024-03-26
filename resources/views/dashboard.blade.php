@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3">DASHBOARD</h1>
        <h3 class="text-xl lg:text-2xl text-bold mb-3">SDIT Al-Qur'aniyyah</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Teacher</h2>
                <p class="text-gray-500">Total teacher: {{ $teacher }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Student</h2>
                <p class="text-gray-500">Total teacher: {{ $student }}</p>
            </div>
        </div>
    </div>
@endsection
