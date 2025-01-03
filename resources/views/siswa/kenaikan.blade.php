@extends('layouts.backend.dashboard.app')

@section('container')
    <div class="container-fixed">
        <div class="flex flex-wrap items-center lg:items-end justify-items-start gap-5 pb-7.5">
            <h1 class="text-xl font-semibold leading-none text-gray-900">
                Menegement Perubahan Kelas
            </h1>
        </div>
        <div class="min-w-full card card-grid">
            <div class="flex flex-col py-5 card-header">
                <label for="pilihKelas" class="mb-2 text-xs rounded lg:text-sm">Pilih Kelas</label>
                <select name="kelas" id="kelas" class="select max-w-80" onchange="searchSiswaNaikKelas(this.value)">
                    <option value="">Pilih</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <form method="post" id="form-kenaikan-kelas">
                <div class="card-body scrollable h-[500px] py-0 my-4 pr-4 mr-2">
                    <div class="content-kenaikan-kelas"></div>
                </div>
                <div class="card-footer">
                    <div class="flex flex-row justify-between w-full content-footer-kenaikan-kelas"></div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script>
            $("#form-kenaikan-kelas").on("submit", function(e) {
                e.preventDefault();

                const form = $(this)[0];
                const formData = new FormData(form);

                const url = "{{ route('siswa.proses-kenaikan') }}";
                $.ajax({
                    url: url,
                    type: "post",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: formData,
                    contentType: false, // Jangan ubah Content-Type
                    processData: false, // Jangan proses data menjadi string
                    beforeSend: function() {
                        LOADING_ALERT("Sedang menyimpan data");
                    },
                    success: function(response) {
                        SUCCESS_ALERT("Kelas Siswa Berhasil diupdate");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseJSON);
                        ERROR_ALERT(xhr.responseJSON.message);
                    },
                });
            });
            const searchSiswaNaikKelas = (kelas) => {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        kelas
                    },
                    url: `{!! route('siswa.kenaikan.list') !!}`,
                    dataType: 'json',
                    success: function(res) {
                        $(".content-kenaikan-kelas").html(res.html);
                        if (res.html.length > 0) {
                            $(".content-footer-kenaikan-kelas").html(`
                                        <label class="form-label flex items-center gap-2.5">
                                            <input type="checkbox" name="checkIdStudentAll" id="checkIdStudentAll" class="checkbox"
                                                onchange="return checkAllKenaikanSiswa()">
                                            Check All
                                        </label>
                                        <label class="form-label flex items-center gap-2.5 justify-end">
                                            Pindah Kelas ke-
                                            <select name="kelas" id="kelas" class="w-64 select">
                                                <option value="">Pilih</option>
                                                @foreach ($kelas as $i)
                                                    <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                                @endforeach
                                                <option value="lulus">Lulus</option>
                                            </select>
                                            <x-primary-button>Save</x-primary-button>
                                        </label>
                            `);
                        }
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
    @endpush
@endsection
