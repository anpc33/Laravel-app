@props(['name', 'options', 'label', 'required'])
<label for="{{ $name }}" class="form-label fw-bold">{{ $label }} {{ (isset($required) && $required == true) ? '(*)' : ''
  }} </label>
<x-selete-address1 :name="$name" :options="$options" />
