


@props(['name', 'options'])
<select :name="$name" class="form-select" style="width: 100%">
  @foreach($options as $key => $val)
  <option value="{{ $key }}">{{ $val }}</option>
  @endforeach
</select>

