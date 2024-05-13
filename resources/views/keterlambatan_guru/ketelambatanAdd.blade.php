@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white"><span
                class="text-gray-500 hover:text-gray-950 dark:hover:text-white"><a
                    href="{{ route('keterlambatan') }}">KETERLAMBATAN</a></span>->Form Keterlambatan</h1>
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
        @if (session('errors'))
            <div class="px-4 py-3 mb-3 text-teal-900 bg-red-100 border-t-4 border-red-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Error</p>
                        <p class="text-xs lg:text-sm">{{ session('errors') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <form action="{{ route('keterlambatanStore') }}" method="post" enctype="multipart/form-data"
                onsubmit="return confirm('Apa anda sudah yakin?')">
                @csrf
                <input type="hidden" value="{{ old('txtteacherid') }}" name="txtteacherid" id="txtteacherid"
                    autocomplete="off" class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="255">
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtname" class="text-xs lg:text-sm">Name</label>

                    <input type="text" value="{{ old('txtname') }}" name="txtname" id="txtname" autocomplete="off"
                        autofocus class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="255"
                        placeholder="Cari nama guru" onkeyup="searchNameTachers(this.value)" required>
                </div>
                <div class="hidden my-5 overflow-y-scroll text-xs lg-text-sm max-h-32 tbl-keterlambatan-add">
                    <table class="w-full">
                        <thead class="sticky top-0 bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">No</th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">Name
                                </th>
                                <th class="px-6 py-3 font-semibold text-left text-gray-800 border border-gray-300">Jabatan
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
                    <label for="txtjabatan" class="text-xs lg:text-sm">Jabatan</label>
                    <input type="hidden" value="{{ old('txtjabatan') }}" name="txtjabatan" id="txtjabatan"
                        autocomplete="off" class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="10" required>
                    <input type="text" value="{{ old('txtnamejabatan') }}" name="txtnamejabatan" id="txtnamejabatan"
                        autocomplete="off" class="text-xs rounded lg:text-sm lg:col-span-2" required>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txttanggal" class="text-xs lg:text-sm">Tanggal</label>
                    <input type="datetime-local" value="{{ old('txttanggal') }}" name="txttanggal" id="txttanggal"
                        autocomplete="off" class="text-xs rounded lg:text-sm lg:col-span-2" required>
                </div>
                <div class="flex flex-col grid-cols-3 gap-4 mb-3 lg:grid">
                    <label for="txtketerangan" class="text-xs lg:text-sm">Keterangan</label>
                    <textarea name="txtketerangan" id="txtketerangan" cols="30" rows="5"
                        class="text-xs rounded lg:text-sm lg:col-span-2" maxlength="255" required>{{ old('txtketerangan') }}</textarea>
                </div>
                <div class="flex justify-center w-full">
                    <button type="submit"
                        class="w-full p-2 text-xs text-white bg-blue-500 rounded-md lg:text-base lg:w-24">Save</button>
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
