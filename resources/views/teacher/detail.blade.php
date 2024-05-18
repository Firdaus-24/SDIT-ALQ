@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('guru.index') }}">GURU</a></span>->Detail Guru</h1>
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <div class="flex flex-col items-center w-full my-3">
                @if ($data && $data->images)
                    <img class="block mb-3 rounded-lg" src="{{ asset('storage/' . $data->images) }}" alt="{{ $data->images }}"
                        width="150" height="400">
                @else
                    <p>No Foto</p>
                @endif
                <button type="button"
                    class="float-right p-2 mb-3 text-xs text-white rounded-full bg-sky-700 lg:text-base lg:w-24"
                    onclick="window.location.href='{{ route('guru.edit', $data->id) }}'">Update</button>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="flex flex-col">
                    <label for="txtname" class="text-xs lg:text-sm">Nama</label>
                    <input type="text" value="{{ $data->name }}" name="txtname" id="txtname" readonly
                        autocomplete="off" autofocus class="text-xs rounded lg:text-sm" maxlength="100">
                </div>
                <div class="flex flex-col">
                    <label for="txtcode" class="text-xs lg:text-sm">Code</label>
                    <input type="text" value="{{ $data->code }}" name="txtcode" id="txtcode" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="10" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtalamat" class="text-xs lg:text-sm">Alamat</label>
                    <input type="text" value="{{ $data->alamat }}" name="txtalamat" id="txtalamat" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="100" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtkelurahan" class="text-xs lg:text-sm">Keluarahan</label>
                    <input type="text" value="{{ $data->kelurahan }}" name="txtkelurahan" id="txtkelurahan"
                        autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="100" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtkota" class="text-xs lg:text-sm">Kota</label>
                    <input type="text" value="{{ $data->kota }}" name="txtkota" id="txtkota" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="100" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtkodepos" class="text-xs lg:text-sm">Kode Pos</label>
                    <input type="number" value="{{ $data->kodepos }}" name="txtkodepos" id="txtkodepos" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="5" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtjk" class="text-xs lg:text-sm">Jenis Kelamin</label>
                    <input type="text" {{ $data->jenis_kelamin == 'P' ? ' value=Pria' : ' value=Wanita' }}
                        name="txtkodepos" id="txtkodepos" autocomplete="off" class="text-xs rounded lg:text-sm"
                        maxlength="5" readonly>

                </div>
                <div class="flex flex-col">
                    <label for="txtagama" class="text-xs lg:text-sm">Agama</label>
                    <input type="text" value="{{ $data->agama }}" name="txtagama" id="txtagama" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="20" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtbank" class="text-xs lg:text-sm">Bank</label>
                    <input type="text" value="{{ $data->bank }}" name="txtbank" id="txtbank" autocomplete="off"
                        class="text-xs rounded lg:text-sm" maxlength="20" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtrekening" class="text-xs lg:text-sm">Rekening</label>
                    <input type="text" value="{{ $data->rekening }}" name="txtrekening" id="txtrekening"
                        autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtnoktp" class="text-xs lg:text-sm">NIK</label>
                    <input type="text" value="{{ $data->no_ktp }}" name="txtnoktp" id="txtnoktp"
                        autocomplete="off" class="text-xs rounded lg:text-sm" maxlength="20" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtnohp" class="text-xs lg:text-sm">Contact</label>
                    <input type="number" value="{{ $data->noHp }}" name="txtnohp" id="txtnohp" autocomplete="off"
                        class="text-xs rounded lg:text-sm" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txttglmasuk" class="text-xs lg:text-sm">Tanggal Masuk</label>
                    <input type="text" value="{{ $data->tgl_masuk }}" name="txttglmasuk" id="txttglmasuk"
                        autocomplete="off" class="text-xs rounded lg:text-sm" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txttglkeluar" class="text-xs lg:text-sm">Tanggal keluar</label>
                    <input type="text" name="txttglkeluar" id="txttglkeluar" autocomplete="off"
                        class="text-xs rounded lg:text-sm" value="{{ $data->tgl_keluar }}" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtemail" class="text-xs lg:text-sm">Email</label>
                    <input type="email" value="{{ $data->email }}" name="txtemail" id="txtemail"
                        autocomplete="off" class="text-xs rounded lg:text-sm" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtjabatan" class="text-xs lg:text-sm">Jabatan</label>
                    <input type="text" value="{{ $data->jabatan->name }}" name="txtjabatan" id="txtjabatan"
                        autocomplete="off" class="text-xs rounded lg:text-sm" readonly>
                </div>
                <div class="flex flex-col">
                    <label for="txtstatus" class="text-xs lg:text-sm">Status</label>
                    <select name="txtstatus" id="txtstatus" class="text-xs rounded lg:text-sm" readonly>
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
                        autocomplete="off" class="text-xs rounded lg:text-sm" readonly>
                </div>

            </div>
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
