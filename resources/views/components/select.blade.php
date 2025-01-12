@props(['name', 'options', 'value'])

<select name="{{ $name }}" class="form-select" style="width: 100%">
  @foreach($options as $key => $val)
  <option value="{{ $key }}" {{ old($name, $value)==$key ? 'selected' : '' }}>
    {{ $val }}
  </option>
  @endforeach
</select>
