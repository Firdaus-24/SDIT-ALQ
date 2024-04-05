@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3"><span class="text-gray-500 hover:text-gray-950"><a
                    href="{{ route('prestasiDetail') }}">DETAIL PRESTASI</a></span>->Form Detail Prestasi</h1>
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
            <form action="{{ route('prestasiDetailAdd') }}" method="post" onsubmit="return confirm('Are you sure?')">
                @csrf
                <input type="hidden" value="{{ old('txtidstudent') }}" name="txtidstudent" id="txtidstudent"
                    autocomplete="off" class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="255">
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtname" class="text-xs lg:text-sm">Nama</label>
                    <div class="flex flex-col lg:col-span-2">
                        <input type="text" value="{{ old('txtname') }}" name="txtname" id="txtname" autocomplete="off"
                            autofocus class="rounded text-xs lg:text-sm w-full" maxlength="255"
                            onkeyup="searchNameStudent(this.value)" required>
                        @error('txtidstudent')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-xs lg-text-sm  max-h-32 my-5 overflow-y-scroll hidden tbl-detailPrestasi-add">
                    <table class="w-full">
                        <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">No</th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">NISN
                                </th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Name
                                </th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Kelas
                                </th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Pilih
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtkelas" class="text-xs lg:text-sm">Kelas</label>
                    <input type="text" value="{{ old('txtkelas') }}" name="txtkelas" id="txtkelas" autocomplete="off"
                        autofocus class="rounded text-xs lg:text-sm lg:col-span-2" readonly>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtprestasiId" class="text-xs lg:text-sm">Jenis Prestasi</label>
                    <div class="flex flex-col lg:col-span-2">
                        <select name="txtprestasiId" id="txtprestasiId" class="rounded text-xs lg:text-sm lg:col-span-2"
                            required>
                            <option value="">Pilih</option>
                            @foreach ($prestasi as $p)
                                <option value="{{ $p->id }}" {{ old('txtprestasiId') == $p->id ? 'selected' : '' }}>
                                    {{ $p->name }}</option>
                            @endforeach
                        </select>
                        @error('txtprestasiId')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txttanggal" class="text-xs lg:text-sm">Tanggal</label>
                    <div class="flex flex-col lg:col-span-2">
                        <input type="datetime-local" value="{{ old('txttanggal') }}" name="txttanggal" id="txttanggal"
                            class="rounded text-xs lg:text-sm lg:col-span-2" required>
                        @error('txttanggal')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtketerangan" class="text-xs lg:text-sm">Keterangan</label>
                    <div class="flex flex-col lg:col-span-2">
                        <textarea name="txtketerangan" id="txtketerangan" cols="30" rows="5"
                            class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="255" required>{{ old('txtketerangan') }}</textarea>
                        @error('txtketerangan')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex w-full justify-center">
                    <button type="submit"
                        class="w-full bg-blue-500 p-2 text-white text-xs lg:text-base lg:w-24 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const searchNameStudent = (name) => {
            let url = "{{ route('list.studentName', ':name') }}";
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
