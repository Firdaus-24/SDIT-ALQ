@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <span class="flex justify-between">
            <h1 class="text-2xl lg:text-4xl text-bold mb-3">DASHBOARD</h1>
            <h3 class="font-bold text-xs lg:text-sm mb-4">Hi... {{ Auth::user()->name }}</h3>
        </span>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Teacher</h2>
                <p class="text-gray-500">Total teacher: {{ $teacher }}</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-sm lg:text-lg font-bold mb-2">Student</h2>
                <p class="text-gray-500">Total student: {{ $student }}</p>
            </div>
        </div>
    </div>
@endsection
