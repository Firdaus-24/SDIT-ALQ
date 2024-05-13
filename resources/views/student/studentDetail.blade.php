@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('student') }}">STUDENT</a></span>->Detail Student</h1>
        @if (session('msg'))
            <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Success</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <div class="flex flex-col items-center my-3">
                @if ($data->images)
                    <img class="block mb-3 rounded-lg" src="{{ asset('storage/' . $data->images) }}"
                        alt="{{ $data->images }}" width="150" height="400">
                @else
                    <p>No fhoto</p>
                @endif
                <button type="button"
                    class="float-right p-2 mb-3 text-xs text-white rounded-full bg-sky-700 lg:text-base lg:w-24"
                    onclick="window.location.href='{{ route('studentEdit', ['id' => $data->id]) }}'">Update</button>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="flex flex-col">
                    <label for="txtname" class="text-xs lg:text-sm">Name</label>
                    <input type="text" value="{{ $data->name }}" name="txtname" id="txtname" @readonly(true)
                        autocomplete="off" autofocus class="text-xs rounded lg:text-sm" maxlength="100">
                </div>
                <div class="flex flex-col">
                    <label for="txtnisn" class="text-xs lg:text-sm">NISN</label>
                    <input type="text" value="{{ $data->nisn }}" name="txtnisn" id="txtnisn" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="10" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtjk" class="text-xs lg:text-sm">Jenis Kelamin</label>
                    <input type="text" {{ $data->jenis_kelamin == 'P' ? 'value=Pria' : 'value=Wanita' }} name="txtnisn"
                        id="txtnisn" autocomplete="off" class="text-xs rounded lg:text-sm" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txttmptlahir" class="text-xs lg:text-sm">Tempat Lahir</label>
                    <input type="text" value="{{ $data->tempat_lahir }}" name="txttmptlahir" id="txttmptlahir"
                        autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="100" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txttgllahir" class="text-xs lg:text-sm">Tanggal Lahir</label>
                    <input type="date" value="{{ $data->tgl_lahir }}" name="txttgllahir" id="txttgllahir"
                        autocomplete="off" class="text-xs rounded lg:text-sm">
                </div>
                <div class="flex flex-col">
                    <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                    <input type="text" value="{{ $data->agama }}" name="txtagama" id="txtagama" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="20" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                    <input type="number" value="{{ $data->kelas }}" name="txtkelas" id="txtkelas" autocomplete="off"
                        class="text-xs rounded lg:text-sm" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtwali" class="text-xs lg:text-sm">Nama Wali</label>
                    <input type="text" value="{{ $data->wali }}" name="txtwali" id="txtwali" autocomplete="off"
                        class="text-xs rounded lg:text-sm" @readonly(true)>
                </div>
            </div>
        </div>
    @endsection
