<div class="grid grid-cols-2 gap-4 p-5 mb-4 md:grid-cols-4 lg:grid-cols-6">
    @foreach ($data as $item)
        <div class="flex">
            <input type="checkbox" name="txtidstudent[]" id="txtidstudentKenaikanKelas"
                class="checkbox txtidstudentKenaikanKelas" value="{{ $item->id }}" onchange="uncheckCheckAll()">
            <div class="flex flex-col items-center justify-center">
                <x-img-rounded
                    images="{{ $item->images ? asset('storage/' . $item->images) : asset('assets/images/nophoto.jpg') }}"></x-img-rounded>
                <p class="text-xs font-bold lg:text-sm">{{ $item->nama }}</p>
            </div>
        </div>
    @endforeach
</div>
