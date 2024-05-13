@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('student') }}">SISWA</a></span>->Update siswa</h1>
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
            <form action="{{ route('studentUpdate', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data"
                onsubmit="return confirm('Apa anda yakin??')">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="flex flex-col">
                        <label for="txtname" class="text-xs lg:text-sm">Name</label>
                        <input type="text" value="{{ $data->name }}" name="txtname" id="txtname" required
                            autocomplete="off" autofocus class="text-xs rounded lg:text-sm" maxlength="100">
                        @error('txtname')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtnisn" class="text-xs lg:text-sm">NISN</label>
                        <input type="text" value="{{ $data->nisn }}" name="txtnisn" id="txtnisn" autocomplete="off"
                            class="text-xs rounded lg:text-sm" maxlength="10">
                        @error('txtnisn')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtjk" class="text-xs lg:text-sm">Jenis Kelamin</label>
                        <select name="txtjk" id="txtjk" class="text-xs rounded lg:text-sm">
                            <option value="">Pilih</option>
                            <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Pria</option>
                            <option value="W" {{ $data->jenis_kelamin == 'W' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('txtjk')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txttmptlahir" class="text-xs lg:text-sm">Tempat Lahir</label>
                        <input type="text" value="{{ $data->tempat_lahir }}" name="txttmptlahir" id="txttmptlahir"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="100" required>
                        @error('txttmptlahir')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txttgllahir" class="text-xs lg:text-sm">Tanggal Lahir</label>
                        <input type="text" value="{{ $data->tgl_lahir }}" name="txttgllahir" id="txttgllahir"
                            autocomplete="off" class="text-xs rounded lg:text-sm">
                        @error('txttgllahir')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                        <input type="text" value="{{ $data->agama }}" name="txtagama" id="txtagama" autocomplete="off"
                            class="text-xs rounded lg:text-sm" maxlength="20" required>
                        @error('txtagama')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                        <input type="number" value="{{ $data->kelas }}" name="txtkelas" id="txtkelas" autocomplete="off"
                            class="text-xs rounded lg:text-sm" required>
                        @error('txtkelas')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtwali" class="text-xs lg:text-sm">Nama Wali</label>
                        <input type="text" value="{{ $data->wali }}" name="txtwali" id="txtwali" autocomplete="off"
                            class="text-xs rounded lg:text-sm" required>
                        @error('txtwali')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="image" class="text-xs lg:text-sm">Upload Fhoto</label>
                        <img class="img-preview shrink-0 h-14 w-14 mb-3 rounded-sm {{ $data->images ? '' : 'hidden' }} "
                            src="{{ asset('storage/' . $data->images) }}">
                        <input type="file" name="image" id="image" autocomplete="off"
                            class="text-xs rounded lg:text-sm" onchange="previewImage(this)">
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-end float-end">
                        <button type="submit"
                            class="float-right p-2 text-xs text-white bg-blue-500 rounded-md lg:text-base lg:w-24">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const previewImage = (input) => {
            if (input.files && input.files[0]) {
                $('.img-preview').css('display', 'block')
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img-preview').attr("src", e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
