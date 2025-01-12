@extends('backend.layout')

@section('content')
<div class="page-content">
  <div class="container-fluid">
    <!-- start page title -->
    <x-breadcrumb :breadcrumb="$breadcrumb" />

    <!-- end page title -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">{{ $breadcrumb }}</h5>
          </div>
          <div class="card-body">


            <div class="container p-4">
              <form action="{{ route('user_catalogue.store') }}" method="post" class="row g-4"
                style="max-width: 1200px; margin: auto;">
                @csrf
                <x-form_error />
                <!-- Vùng 1: Thông tin cơ bản -->
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3">
                      <h5 class="fw-bold text-primary">@lang('form.basic_info')</h5>
                    </div>
                    <div class="col-md-9">
                      <fieldset class="p-3 border rounded">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <x-input-label name="name" placeholder="Enter Your Name" label="Name" :value="old('name')"
                              :required="true" />
                          </div>

                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>



                <!-- Nút Submit -->
                <div class="col-12 text-end mt-4">
                  <button type="submit" class="btn btn-success">Lưu</button>
                  <button type="reset" class="btn btn-secondary">Nhập lại</button>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!--end col-->
  </div>
  <!--end row-->


  <!-- end row -->
</div>
<!-- container-fluid -->

@endsection
