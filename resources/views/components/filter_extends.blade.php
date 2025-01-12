@props(['filters'])

<div class="filters d-block d-md-flex align-items-center px-2" style="width: 130px">
  @if(isset($filters) && is_array($filters) && count($filters))
  @foreach($filters as $filter)
  <select class="form-control" name="{{ $filter['name'] }}">
    @if(isset($filter['options']) && is_array($filter['options']) && count($filter['options']))
    @foreach($filter['options'] as $key => $option)
    <option value="{{ $key }}" {{ request($filter['name'])==$key ? 'selected' : '' }}>
      {{ $option }}
    </option>
    @endforeach
    @endif
  </select>
  @endforeach
  @endif
</div>
