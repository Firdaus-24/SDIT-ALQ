@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3"><span class="text-gray-500 hover:text-gray-950"><a
                    href="{{ route('student') }}">STUDENT</a></span>->Form Student</h1>
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
            <form action="{{ route('studentStore') }}" method="post" enctype="multipart/form-data"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="txtname" class="text-xs lg:text-sm">Name</label>
                        <input type="text" value="{{ old('txtname') }}" name="txtname" id="txtname" required
                            autocomplete="off" autofocus class="rounded text-xs lg:text-sm" maxlength="100">
                        @error('txtname')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtnisn" class="text-xs lg:text-sm">NISN</label>
                        <input type="text" value="{{ old('txtnisn') }}" name="txtnisn" id="txtnisn" autocomplete="off"
                            class="rounded text-xs lg:text-sm" maxlength="10">
                        @error('txtnisn')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtjk" class="text-xs lg:text-sm">Jenis Kelamin</label>
                        <select name="txtjk" id="txtjk" class="rounded text-xs lg:text-sm">
                            <option value="">Pilih</option>
                            <option value="P" {{ old('txtjk') == 'P' ? 'selected' : '' }}>Pria</option>
                            <option value="W" {{ old('txtjk') == 'W' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('txtjk')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txttmptlahir" class="text-xs lg:text-sm">Tempat Lahir</label>
                        <input type="text" value="{{ old('txttmptlahir') }}" name="txttmptlahir" id="txttmptlahir"
                            autocomplete="off" class="rounded text-xs lg:text-sm" maxlength="100" required>
                        @error('txttmptlahir')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txttgllahir" class="text-xs lg:text-sm">Tanggal Lahir</label>
                        <input type="date" value="{{ old('txttgllahir') }}" name="txttgllahir" id="txttgllahir"
                            autocomplete="off" class="rounded text-xs lg:text-sm">
                        @error('txttgllahir')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                        <input type="text" value="{{ old('txtagama') }}" name="txtagama" id="txtagama"
                            autocomplete="off" class="rounded text-xs lg:text-sm" maxlength="20" required>
                        @error('txtagama')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                        <input type="number" value="{{ old('txtkelas') }}" name="txtkelas" id="txtkelas"
                            autocomplete="off" class="rounded text-xs lg:text-sm" required>
                        @error('txtkelas')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtwali" class="text-xs lg:text-sm">Nama Wali</label>
                        <input type="text" value="{{ old('txtwali') }}" name="txtwali" id="txtwali" autocomplete="off"
                            class="rounded text-xs lg:text-sm" required>
                        @error('txtwali')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="image" class="text-xs lg:text-sm">Upload Fhoto</label>
                        <img class="img-preview shrink-0 h-14 w-14 mb-3 rounded-sm hidden" src="">
                        <input type="file" name="image" id="image" autocomplete="off"
                            class="rounded text-xs lg:text-sm" onchange="previewImage(this)">
                        @error('image')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-end float-end">
                        <button type="submit"
                            class="bg-blue-500 p-2 text-white text-xs lg:text-base lg:w-24 float-right rounded-md">Save</button>
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
