@props(['data', 'tableHead', 'module'])

@if(isset($data) && !is_null($data) && count($data))
@foreach($data as $item)
<tr>
  <th scope="row">
    <div class="form-check">
      <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
    </div>
  </th>
  @foreach($tableHead as $key => $val)
  <td>{{ $item->{$key} }}</td>
  @endforeach
  <x-action :module="$module" :item="$item"  :data="$data"/>
</tr>
@endforeach
@endif
