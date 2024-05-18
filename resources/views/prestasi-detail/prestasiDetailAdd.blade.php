@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('detailprestasi-siswa.index') }}">DETAIL
                    PRESTASI</a></span>->Form Detail Prestasi</h1>
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
            <form action="{{ route('detailprestasi-siswa.store') }}" method="post"
                onsubmit="return confirm('Anda yakin menyimpan data ini?')">
                @csrf
                <input type="hidden" value="{{ old('txtidstudent') }}" name="txtidstudent" id="txtidstudent"
                    autocomplete="off" class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="255">
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtname" class="text-xs lg:text-sm">Nama</label>
                    <div class="flex flex-col lg:col-span-2">
                        <input type="text" value="{{ old('txtname') }}" name="txtname" id="txtname" autocomplete="off"
                            autofocus class="w-full text-xs rounded lg:text-sm" maxlength="255"
                            onkeyup="searchNameStudent(this.value)" required>
                        @error('txtidstudent')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="hidden my-5 overflow-y-scroll text-xs lg-text-sm max-h-32 tbl-detailPrestasi-add">
                    <table class="w-full">
                        <thead class="sticky top-0 bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">No</th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">NISN
                                </th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">Name
                                </th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">Kelas
                                </th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">Pilih
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                    <input type="text" value="{{ old('txtkelas') }}" name="txtkelas" id="txtkelas" autocomplete="off"
                        autofocus class="text-xs rounded lg:text-sm lg:col-span-2" readonly>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtprestasiId" class="text-xs lg:text-sm">Jenis Prestasi</label>
                    <div class="flex flex-col lg:col-span-2">
                        <select name="txtprestasiId" id="txtprestasiId" class="text-xs rounded lg:text-sm lg:col-span-2"
                            required>
                            <option value="">Pilih</option>
                            @foreach ($prestasi as $p)
                                <option value="{{ $p->id }}" {{ old('txtprestasiId') == $p->id ? 'selected' : '' }}>
                                    {{ $p->name }}</option>
                            @endforeach
                        </select>
                        @error('txtprestasiId')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txttanggal" class="text-xs lg:text-sm">Tanggal</label>
                    <div class="flex flex-col lg:col-span-2">
                        <input type="datetime-local" value="{{ old('txttanggal') }}" name="txttanggal" id="txttanggal"
                            class="text-xs rounded lg:text-sm lg:col-span-2" required>
                        @error('txttanggal')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtketerangan" class="text-xs lg:text-sm">Keterangan</label>
                    <div class="flex flex-col lg:col-span-2">
                        <textarea name="txtketerangan" id="txtketerangan" cols="30" rows="5"
                            class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="255" required>{{ old('txtketerangan') }}</textarea>
                        @error('txtketerangan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center w-full">
                    <button type="submit"
                        class="w-full p-2 text-xs text-white bg-blue-500 rounded-md lg:text-base lg:w-24">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const searchNameStudent = (name) => {
            let url = "{{ route('detailprestasi-siswaByName.list', ':name') }}";
            url = url.replace(':name', name);
            if (name.length > 0) {
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(msg) {
                        let trhtml = ""
                        if (msg.length > 0) {
                            return $.each(msg, function(i) {
                                trhtml += `<tr>
                                <td class="px-6 py-4 border border-gray-300">${[i + 1]}</td>
                                <td class="px-6 py-4 border border-gray-300">${msg[i].name}</td>
                                <td class="px-6 py-4 border border-gray-300">${msg[i].nisn}</td>
                                <td class="px-6 py-4 border border-gray-300">${msg[i].kelas}</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <input type='radio'  onclick="getNameStudent('${msg[i].id}','${msg[i].name}', '${msg[i].kelas}')">    
                                </td>
                            </tr>`

                                $('.tbl-detailPrestasi-add').show()
                                $('.tbl-detailPrestasi-add tbody').html(trhtml)
                            })
                        }
                    }
                });
            } else {
                $('.tbl-detailPrestasi-add').hide()
                $('.tbl-detailPrestasi-add tbody').html('')
            }
        }

        const getNameStudent = (id, name, kelas) => {
            $(".tbl-detailPrestasi-add").hide()
            $(".tbl-detailPrestasi-add tbody").empty();
            $("#txtidstudent").val(id)
            $("#txtname").val(name)
            $("#txtkelas").val(kelas)
        }
    </script>
@endsection
