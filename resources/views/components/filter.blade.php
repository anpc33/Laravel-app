<div class="d-flex align-items-center mt-3 m-2">
  <!-- Số bản ghi mỗi trang -->

  <select name="per_page" class="form-select me-3">
    <option value="10" {{ request('per_page')==10 ? 'selected' : '' }}>10</option>
    <option value="25" {{ request('per_page')==25 ? 'selected' : '' }}>25</option>
    <option value="50" {{ request('per_page')==50 ? 'selected' : '' }}>50</option>
    <option value="100" {{ request('per_page')==100 ? 'selected' : '' }}>100</option>
  </select>


  <!-- Trạng thái -->
  <select class="form-control me-3" name="status">
    <option value="0">Tất cả trạng thái</option>
    <option value="1" {{ request('status')=='1' ? 'selected' : '' }}>Đang hoạt động</option>
    <option value="2" {{ request('status')=='0' ? 'selected' : '' }}>Đã khóa</option>
  </select>

  <!-- Ngày tạo -->

  <input type="text" class="form-control me-3 " style="width: 120px" id="date-range" name="date_range"
    placeholder="Chọn khoảng thời gian" value="{{ request('date_range') }}" />

  <!-- Muốn tìm kiếm khoảng thời gian theo -->
  @php
  $dateFilterOptions = [
  'created_at' => 'Ngày tạo',
  'updated_at' => 'Ngày cập nhật',
  'date_of_birth' => 'Ngày sinh',
  ];
  @endphp
  <!-- Muốn tìm kiếm khoảng thời gian theo -->
  <select class="form-control me-3" name="date_filter_field">
    <option value="0">Lọc theo thời gian</option>
    @foreach($dateFilterOptions as $key => $val)
    <option value="{{ $key }}" {{ request('date_filter_field')==$key ? 'selected' : '' }}>{{ $val }}</option>
    @endforeach
  </select>



  <!-- Sắp xếp -->
  @php
  $sortBy = [
  'name_asc' => 'Tên (A-Z)',
  'name_desc' => 'Tên (Z - A)',
  ];
  @endphp
  <select class="form-control me-3" name="sort_by">
    <option value="0">Sắp xếp</option>
    @foreach($sortBy as $key => $val)
    <option value="{{ $key }}" {{ request('sort_by')==$key ? 'selected' : '' }}>{{ $val }}</option>
    @endforeach
  </select>

  <!-- Tìm kiếm -->
  <input type="search" class="form-control flex-grow-1 me-3" placeholder="Tìm kiếm ..." aria-label="Search"
    name="keyword" value="{{ request('search') }}" />

  <!-- Nút tìm kiếm -->
  <input class="btn btn-outline-primary me-3" type="submit" value="Tìm kiếm" />
  <button type="button" class="btn btn-secondary me-3" id="clear-date-range">Xóa</button>
</div>
