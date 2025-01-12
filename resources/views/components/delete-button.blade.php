@props(['route', 'id'])

<form action="{{ route($route, $id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="dropdown-item text-danger">
        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete
    </button>
</form>
