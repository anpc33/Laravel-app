@props(['module', 'item', 'data'])

<td>
  <div class="form-check form-switch">
    <input class="form-check-input updateByField" data-id="{{ $item->id }}" data-value="{{ $item->status }}"
      data-field="status" data-model="{{ $module }}" type="checkbox" role="switch" id="SwitchCheck1"
      @if(isset($item->status) && $item->status == 2)
    checked
    @endif
    >
  </div>
</td>

<td class="align-items-center d-flex gap-3">

  <div class="d-flex gap-3">
    <a class="edit-item-btn" href=" {{ route($module . '.edit', $item->id) }} ">

      <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit
    </a>
    <a>
      <x-delete-button :route="$module . '.destroy'" :id="$item->id" />
    </a>
  </div>

  <div class="dropdown d-inline-block">
    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      <i class="ri-more-fill align-middle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <a href="" class="dropdown-item">
          {{-- {{ route($module . '.show', $item->id) }} --}}
          <i class="ri-eye-fill align-bottom me-2 text-muted"></i>View
        </a>
      </li>

    </ul>
  </div>
</td>
