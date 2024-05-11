@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('teachers') }}">GURU</a></span>->Update guru</h1>
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
            <form action="{{ route('teacherUpdate', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="flex flex-col">
                        <label for="txtname" class="text-xs lg:text-sm">Nama</label>
                        <input type="text" value="{{ $data->name }}" name="txtname" id="txtname" required
                            autocomplete="off" autofocus class="text-xs rounded lg:text-sm" maxlength="100">
                        @error('txtname')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtcode" class="text-xs lg:text-sm">Code</label>
                        <input type="text" value="{{ $data->code }}" name="txtcode" id="txtcode" autocomplete="off"
                            class="text-xs rounded lg:text-sm" maxlength="10">
                        @error('txtcode')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtalamat" class="text-xs lg:text-sm">Alamat</label>
                        <input type="text" value="{{ $data->alamat }}" name="txtalamat" id="txtalamat" autocomplete="off"
                            class="text-xs rounded lg:text-sm" maxlength="100" required>
                        @error('txtalamat')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtkelurahan" class="text-xs lg:text-sm">Keluarahan</label>
                        <input type="text" value="{{ $data->kelurahan }}" name="txtkelurahan" id="txtkelurahan"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="100">
                        @error('txtkelurahan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtkota" class="text-xs lg:text-sm">Kota</label>
                        <input type="text" value="{{ $data->kota }}" name="txtkota" id="txtkota" autocomplete="off"
                            class="text-xs rounded lg:text-sm" maxlength="100" required>
                        @error('txtkota')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtkodepos" class="text-xs lg:text-sm">Kode Pos</label>
                        <input type="number" value="{{ $data->kodepos }}" name="txtkodepos" id="txtkodepos"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="5" required>
                        @error('txtkodepos')
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
                        <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                        <input type="text" value="{{ $data->agama }}" name="txtagama" id="txtagama"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20" required>
                        @error('txtagama')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtbank" class="text-xs lg:text-sm">Bank</label>
                        <input type="text" value="{{ $data->bank }}" name="txtbank" id="txtbank"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20" required>
                        @error('txtbank')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtrekening" class="text-xs lg:text-sm">Rekening</label>
                        <input type="text" value="{{ $data->rekening }}" name="txtrekening" id="txtrekening"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20">
                        @error('txtrekening')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtnoktp" class="text-xs lg:text-sm">NIK</label>
                        <input type="text" value="{{ $data->no_ktp }}" name="txtnoktp" id="txtnoktp"
                            autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20" required>
                        @error('txtnoktp')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtnohp" class="text-xs lg:text-sm">Contact</label>
                        <input type="number" value="{{ $data->noHp }}" name="txtnohp" id="txtnohp"
                            autocomplete="off" class="text-xs rounded lg:text-sm" required>
                        @error('txtnohp')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txttglmasuk" class="text-xs lg:text-sm">Tanggal Masuk</label>
                        <input type="text" value="{{ $data->tgl_masuk }}" name="txttglmasuk" id="txttglmasuk"
                            autocomplete="off" class="text-xs rounded lg:text-sm" required onfocus="(this.type='date')">
                    </div>
                    <div class="flex flex-col">
                        <label for="txttglkeluar" class="text-xs lg:text-sm">Tanggal keluar</label>
                        <input type="text" name="txttglkeluar" id="txttglkeluar" autocomplete="off"
                            class="text-xs rounded lg:text-sm" value="{{ $data->tgl_keluar }}"
                            onfocus="(this.type='date')">
                    </div>
                    <div class="flex flex-col">
                        <label for="txtemail" class="text-xs lg:text-sm">Email</label>
                        <input type="email" value="{{ $data->email }}" name="txtemail" id="txtemail"
                            autocomplete="off" class="text-xs rounded lg:text-sm" required>
                        @error('txtemail')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="txtjabatan" class="text-xs lg:text-sm">Jabatan</label>
                        <select name="txtjabatan" id="txtjabatan" class="text-xs rounded lg:text-sm" required>
                            <option value="">Pilih</option>
                            @foreach ($jabatans as $j)
                                <option value="{{ $j->id }}" {{ $data->jab_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="txtstatus" class="text-xs lg:text-sm">Status</label>
                        <select name="txtstatus" id="txtstatus" class="text-xs rounded lg:text-sm" required>
                            <option value="">Pilih</option>
                            <option value="nikah" {{ $data->status == 'nikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="single" {{ $data->status == 'single' ? 'selected' : '' }}>Single</option>
                            <option value="duda/janda" {{ $data->status == 'duda/janda' ? 'selected' : '' }}>Duda /
                                Janda</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="txtjmlanak" class="text-xs lg:text-sm">Jumlah Anak</label>
                        <input type="number" value="{{ $data->jumlah_anak }}" name="txtjmlanak" id="txtjmlanak"
                            autocomplete="off" class="text-xs rounded lg:text-sm" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="image" class="text-xs lg:text-sm">Upload Fhoto</label>
                        @if ($data->images)
                            <img class="mb-3 rounded-sm img-preview shrink-0 h-14 w-14"
                                src="{{ asset('storage/' . $data->images) }}">
                        @else
                            <img class="hidden mb-3 rounded-sm img-preview shrink-0 h-14 w-14" src="">
                        @endif
                        <input type="file" name="image" id="image" autocomplete="off"
                            class="text-xs rounded lg:text-sm" onchange="previewImage(this)">
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-end float-end">
                        <button type="submit"
                            class="float-right p-2 text-xs text-white bg-blue-500 rounded-md lg:text-base lg:w-24">Save</button>
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
