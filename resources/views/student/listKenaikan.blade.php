<div class="flex flex-col w-full md:flex-row">
    <div class="grid grid-cols-2 gap-2 mb-3 lg:w-4/5 md:grid-cols-3 lg:grid-cols-5">
        <div class="col-span-2 px-3 md:col-span-4 lg:col-span-5 font-white">
            <input type="checkbox" name="checkIdStudentAll" id="checkIdStudentAll"
                onchange="return checkAllKenaikanSiswa()">
            <label for="checkIdStudentAll" class="font-semibold ">Check All</label>
        </div>
        @foreach ($data as $item)
            <div
                class="relative flex flex-col items-center justify-center h-48 p-1 overflow-hidden border-solid rounded max-w-40 border-sky-500">
                <input type="checkbox" name="txtidstudent[]" id="txtidstudentKenaikanKelas"
                    class="absolute top-0 left-0 m-2 txtidstudentKenaikanKelas" value="{{ $item->id }}"
                    onchange="uncheckCheckAll()">
                <img src="{{ $item->images ? asset('storage/' . $item->images) : asset('assets/images/nophoto.jpg') }}"
                    alt="sd-it-logo" class="max-w-[7rem] max-h-32 mb-3 ">
                <span class="w-full justify-self-start">
                    <p class="text-xs font-bold lg:text-sm">{{ $item->name }}</p>
                    <p class="text-xs font-extralight lg:text-sm">{{ $item->nisn }}
                        {{ $item->is_lulus == 'T' ? '- (Lulus)' : '' }}
                    </p>
                    <p class="text-xs lg:text-sm font-extralight">Kelas - {{ $item->kelas }}</p>
                </span>
            </div>
        @endforeach
    </div>
    <div class="flex flex-col items-center justify-center lg:w-1/5 ">
        <label for="pilihKelas" class="mb-2 text-xs rounded lg:text-sm">Pindah Kelas ke-</label>
        <select name="kelas" id="kelas" class="w-64 mb-2 text-xs text-black rounded lg:text-sm ">
            <option value="">Pilih</option>
            <option value="1" {{ old('kelas') == '1' ? 'selected' : '' }}>Kelas 1</option>
            <option value="2" {{ old('kelas') == '2' ? 'selected' : '' }}>Kelas 2</option>
            <option value="3" {{ old('kelas') == '3' ? 'selected' : '' }}>Kelas 3</option>
            <option value="4" {{ old('kelas') == '4' ? 'selected' : '' }}>Kelas 4</option>
            <option value="5" {{ old('kelas') == '5' ? 'selected' : '' }}>Kelas 5</option>
            <option value="6" {{ old('kelas') == '6' ? 'selected' : '' }}>Kelas 6</option>
            <option value="7" {{ old('kelas') == '7' ? 'selected' : '' }}>Lulus</option>
        </select>
        <button type="submit" class="p-2 mb-4 text-xs text-white rounded-md bg-sky-700 lg:text-base">Save</button>
    </div>
</div>
