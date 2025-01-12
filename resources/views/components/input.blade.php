@props(['name', 'placeholder', 'type', 'value' => null]) <!-- Thêm 'value' mặc định là null -->

<input
  name="{{ $name }}"
  type="{{ (isset($type)) ? $type : 'text' }}"
  class="form-control"
  placeholder="{{ html_entity_decode($placeholder) }}"
  value="{{ old($name, $value) }}"
  id="{{ $name }}"
>
