@extends('layouts.app')


@section('container')
    <!-- Content -->
    <div class="container p-4 mx-auto mt-1">
        <span class="flex flex-col">
            <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">Errors</h1>
            <h3 class="mb-4 text-xs font-bold lg:text-sm dark:text-white">Hi... {{ Auth::user()->name }}</h3>
        </span>

        <div class="grid grid-cols-12">
            <!-- Card 1 -->
            <div class="col-span-12 p-4 bg-white rounded-lg shadow-md">
                {{ $exceptions }}
            </div>

        </div>
    </div>
@endsection
