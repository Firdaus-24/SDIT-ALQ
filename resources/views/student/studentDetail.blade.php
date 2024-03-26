@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3"><span class="text-gray-500 hover:text-gray-950"><a
                    href="{{ route('student') }}">STUDENT</a></span>->Detail Student</h1>
        @if (session('msg'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-3 rounded-lg"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="font-bold text-sm lg:text-base">Success</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <div class="flex flex-col items-center  my-3">
                @if ($data->images)
                    <img class="block rounded-lg mb-3" src="{{ asset('storage/' . $data->images) }}"
                        alt="{{ $data->images }}" width="150" height="400">
                @else
                    <p>No fhoto</p>
                @endif
                <button type="button"
                    class="bg-sky-700 p-2 text-white text-xs lg:text-base lg:w-24 float-right rounded-full mb-3"
                    onclick="window.location.href='{{ route('studentEdit', ['id' => $data->id]) }}'">Update</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="txtname" class="text-xs lg:text-sm">Name</label>
                    <input type="text" value="{{ $data->name }}" name="txtname" id="txtname" @readonly(true)
                        autocomplete="off" autofocus class="rounded text-xs lg:text-sm" maxlength="100">
                </div>
                <div class="flex flex-col">
                    <label for="txtnisn" class="text-xs lg:text-sm">NISN</label>
                    <input type="text" value="{{ $data->nisn }}" name="txtnisn" id="txtnisn" autocomplete="off"
                        class="rounded text-xs lg:text-sm" maxlength="10" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtjk" class="text-xs lg:text-sm">Jenis Kelamin</label>
                    <input type="text" {{ $data->jenis_kelamin == 'P' ? 'value=Pria' : 'value=Wanita' }} name="txtnisn"
                        id="txtnisn" autocomplete="off" class="rounded text-xs lg:text-sm" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txttmptlahir" class="text-xs lg:text-sm">Tempat Lahir</label>
                    <input type="text" value="{{ $data->tempat_lahir }}" name="txttmptlahir" id="txttmptlahir"
                        autocomplete="off" class="rounded text-xs lg:text-sm" maxlength="100" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txttgllahir" class="text-xs lg:text-sm">Tanggal Lahir</label>
                    <input type="date" value="{{ $data->tgl_lahir }}" name="txttgllahir" id="txttgllahir"
                        autocomplete="off" class="rounded text-xs lg:text-sm">
                </div>
                <div class="flex flex-col">
                    <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                    <input type="text" value="{{ $data->agama }}" name="txtagama" id="txtagama" autocomplete="off"
                        class="rounded text-xs lg:text-sm" maxlength="20" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                    <input type="number" value="{{ $data->kelas }}" name="txtkelas" id="txtkelas" autocomplete="off"
                        class="rounded text-xs lg:text-sm" @readonly(true)>
                </div>
                <div class="flex flex-col">
                    <label for="txtwali" class="text-xs lg:text-sm">Nama Wali</label>
                    <input type="text" value="{{ $data->wali }}" name="txtwali" id="txtwali" autocomplete="off"
                        class="rounded text-xs lg:text-sm" @readonly(true)>
                </div>
            </div>
        </div>
    @endsection
