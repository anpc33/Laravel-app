@props(['name', 'options', 'label', 'required'])

<label for="{{ $name }}" class="form-label">
  {{ $label }}
  {{ isset($required) && $required == true ? '(*)' : '' }}
</label>

<x-select :name="$name" :options="$options" :value="old($name)" />
