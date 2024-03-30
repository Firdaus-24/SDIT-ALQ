@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="text-2xl lg:text-4xl text-bold mb-3"><span class="text-gray-500 hover:text-gray-950"><a
                    href="{{ route('keterlambatan') }}">KETERLAMBATAN</a></span>->Form Keterlambatan</h1>
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
        @if (session('errors'))
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-3 rounded-lg"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="font-bold text-sm lg:text-base">Error</p>
                        <p class="text-xs lg:text-sm">{{ session('errors') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-full bg-white p-4 shadow-md rounded-lg overflow-x-auto">
            <form action="{{ route('keterlambatanUpdate', ['id' => $data->id]) }}" method="post"
                enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
                @csrf
                <input type="hidden" name="txtteacherid" id="txtteacherid" autocomplete="off"
                    class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="255" value="{{ $data->teacher_id }}">
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtname" class="text-xs lg:text-sm">Name</label>

                    <input type="text" name="txtname" id="txtname" autocomplete="off" autofocus
                        class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="255"
                        onkeyup="searchNameTachers(this.value)" value="{{ $data->teacher->name }}" required>
                </div>
                <div class="text-xs lg-text-sm  max-h-32 my-5 overflow-y-scroll hidden tbl-keterlambatan-add">
                    <table class="w-full">
                        <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">No</th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Name
                                </th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Jabatan
                                </th>
                                <th class="px-6 py-3 border border-gray-300 text-left font-semibold text-gray-800">Pilih
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4 border border-gray-300">1</td>
                                <td class="px-6 py-4 border border-gray-300">Daus</td>
                                <td class="px-6 py-4 border border-gray-300">halima</td>
                                <td class="px-6 py-4 border border-gray-300">pilih</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtjabatan" class="text-xs lg:text-sm">Jabatan</label>
                    <input type="hidden" value="{{ $data->jab_id }}" name="txtjabatan" id="txtjabatan" autocomplete="off"
                        class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="10" required>
                    <input type="text" value="{{ $data->jabatan->name }}" name="txtnamejabatan" id="txtnamejabatan"
                        autocomplete="off" class="rounded text-xs lg:text-sm lg:col-span-2" required>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txttanggal" class="text-xs lg:text-sm">Tanggal</label>
                    <input type="datetime-local" value="{{ $data->tanggal }}" name="txttanggal" id="txttanggal"
                        autocomplete="off" class="rounded text-xs lg:text-sm lg:col-span-2" required>
                </div>
                <div class="flex flex-col lg:grid grid-cols-3 gap-4 mb-3">
                    <label for="txtketerangan" class="text-xs lg:text-sm">Keterangan</label>
                    <textarea name="txtketerangan" id="txtketerangan" cols="30" rows="5"
                        class="rounded text-xs lg:text-sm lg:col-span-2" maxlength="255" required>{{ $data->keterangan }}</textarea>
                </div>
                <div class="flex w-full justify-center">
                    <button type="submit"
                        class="w-full bg-blue-500 p-2 text-white text-xs lg:text-base lg:w-24 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const searchNameTachers = (name) => {
            let url = "{{ route('list.nameTeacher', ':name') }}";
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
                                    <td class="px-6 py-4 border border-gray-300">${msg[i].jabatan.name}</td>
                                    <td class="px-6 py-4 border border-gray-300">
                                        <input type='radio' onclick="getName('${msg[i].name}','${msg[i].jabatan.name}', '${msg[i].jab_id}', '${msg[i].id}')" >    
                                    </td>
                                </tr>`

                                $('.tbl-keterlambatan-add').show()
                                $('.tbl-keterlambatan-add tbody').html(trhtml)
                            })
                        }
                    }
                });
            } else {
                $('.tbl-keterlambatan-add').hide()
                $('.tbl-keterlambatan-add tbody').html('')
            }
        }

        const getName = (name, jabname, jabid, teacherid) => {
            $(".tbl-keterlambatan-add").hide()
            $(".tbl-keterlambatan-add tbody").empty();
            $("#txtname").val(name)
            $("#txtjabatan").val(jabid)
            $("#txtnamejabatan").val(jabname)
            $("#txtteacherid").val(teacherid)
        }

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
