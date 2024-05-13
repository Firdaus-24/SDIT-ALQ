@extends('layouts.app')

@section('container')
    <div class="container p-4 mx-auto mt-1">
        <h1 class="mb-3 text-2xl lg:text-4xl text-bold dark:text-white">Menegement Kenaikan Kelas</h1>
        @if (session('msg'))
            <div class="px-4 py-3 mb-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-lg rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1 mx-3">
                        <i class="fa fa-exclamation"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold lg:text-base">Perhatian</p>
                        <p class="text-xs lg:text-sm">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <div class="flex flex-col items-center my-2 text-center">
                <label for="pilihKelas" class="mb-2 text-xs rounded lg:text-sm">Pilih Kelas</label>
                <select name="kelas" id="kelas" class="w-64 mb-2 text-xs rounded lg:text-sm"
                    onchange="searchSiswaNaikKelas(this.value)">
                    <option value="">Pilih</option>
                    <option value="1" {{ old('kelas') == '1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="2" {{ old('kelas') == '2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="3" {{ old('kelas') == '3' ? 'selected' : '' }}>Kelas 3</option>
                    <option value="4" {{ old('kelas') == '4' ? 'selected' : '' }}>Kelas 4</option>
                    <option value="5" {{ old('kelas') == '5' ? 'selected' : '' }}>Kelas 5</option>
                    <option value="6" {{ old('kelas') == '6' ? 'selected' : '' }}>Kelas 6</option>
                </select>
            </div>
            <form action="{{ route('studentProsesKenaikan') }}" method="post"
                onsubmit="return alert('apa anda yakin untuk merubah kelas?')">
                @csrf
                <div class="content-kenaikan-kelas"></div>
            </form>
        </div>
    </div>
@endsection

<script>
    const searchSiswaNaikKelas = (kelas) => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: {
                kelas
            },
            url: `{{ url('kenaikan/list') }}`,
            dataType: 'json',
            success: function(res) {
                $(".content-kenaikan-kelas").html(res.html);
            }
        })
    }
    const checkAllKenaikanSiswa = () => {
        const isChecked = $("input:checkbox.txtidstudentKenaikanKelas").prop('checked');
        $("input:checkbox.txtidstudentKenaikanKelas").prop('checked', !isChecked);
    }

    const uncheckCheckAll = () => {
        if (!$(this).prop("checked")) {
            $("#checkIdStudentAll").prop('checked', false);
        }
    }
</script>
