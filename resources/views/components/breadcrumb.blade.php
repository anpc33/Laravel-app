
@props(['breadcrumb'])
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
      <h4 class="mb-sm-0">User</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="javascript: void(0);">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">
            {{ $breadcrumb }}
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
