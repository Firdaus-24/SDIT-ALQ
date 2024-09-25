@php
    $modalSizeClass = match ($modalSize) {
        'small' => 'modal-center-y max-w-[400px]',
        'medium' => 'modal-center-y lg:max-w-[800px]',
        'large' => ' modal-center-y lg:max-w-[1100px]',
        'xlarge' => 'modal-overlay',
        default => 'max-w-md', // default size
    };
@endphp

<div class="hidden modal" data-modal="true" id="{{ $id }}">
    <div class="modal-content {{ $modalSizeClass }}">
        <div class="modal-header">
            <h3 class="modal-title">
                {{ $modalTitle }}
            </h3>
            <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true">
                <i class="ki-outline ki-cross">
                </i>
            </button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
    </div>
</div>
