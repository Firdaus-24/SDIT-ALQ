<x-modal id="{{ $id }}" modalTitle="{{ $modalTitle }}" modalSize="small">
    <form action="" id="{{ $formId }}" enctype="multipart/form-data">
        <div class="w-full mt-3">
            <div class="flex flex-col items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <x-input-label class="mb-3">
                    Pilih Fle (excel) <span class="text-danger">*</span>
                </x-input-label>
                <x-text-input type="file" name="file" id="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    required></x-text-input>
            </div>
        </div>
        <hr class="mt-4">
        <div class="grid mt-4 justify-items-center">
            <div class="flex gap-4">
                <x-secondary-button data-modal-dismiss="true">
                    Cancel
                </x-secondary-button>
                <x-primary-button id="upload">
                    <x-spinner></x-spinner>
                    Upload
                </x-primary-button>
            </div>
        </div>
    </form>
</x-modal>
