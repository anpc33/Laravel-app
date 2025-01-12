@props(['name', 'options', 'label', 'required'])
<label for="{{ $name }}" class="form-label fw-bold">{{ $label }} {{ (isset($required) && $required == true) ? '(*)' : ''
  }}
 </label>
<br>
<x-textarea />
