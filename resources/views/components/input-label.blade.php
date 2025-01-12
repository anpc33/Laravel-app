@props(['name', 'placeholder', 'label', 'required', 'type', 'value' => null]) <!-- Thêm 'value' mặc định là null -->

@php
    $type = (isset($type)) ? $type : 'text';
@endphp

<label for="{{ $name }}" class="form-label">
    {{ $label }} {{ (isset($required) && $required == true) ? '(*)' : '' }}
</label>

<x-input :type="$type" :name="$name" :placeholder="$placeholder" :value="$value" />
