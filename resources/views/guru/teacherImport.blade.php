@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('guru.index') }}">GURU</a></span>->Import excel</h1>
        @if ($errors->any())
            <div class="relative px-4 py-3 my-5 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan inputan Anda:</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('guru.prosesImport') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col text-center rounded-lg shadow-md bg-slate-800 dark:bg-white w-80 lg:96">
                <h3 class="p-2 m-2 text-base font-semibold bg-[#948979] rounded-t-lg text-slate-300 text-[10px] lg:text-sm">
                    Import file
                    guru</h3>
                <input type="file" name="file" id="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    class="p-1 m-2 text-sm ">
                <button type="submit"
                    class="p-2 m-2 rounded-b-lg bg-[#153448] text-[#948979] hover:text-[#153448] hover:bg-[#3C5B6F]">Upload</button>
            </div>
        </form>
    </div>
@endsection
