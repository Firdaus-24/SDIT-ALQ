@props(['name' => '', 'id' => '', 'required' => false])

<select class="select" name="{{ $name }}" id="{{ $id }}"
    @if ($required) required @endif>
    {{ $slot }}
</select>
