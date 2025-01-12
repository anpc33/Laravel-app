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

            @php
            $action = (isset($method) && $method === 'create' ) ? route('user.store') : route('user.update', $data);
            @endphp
            <div class="container p-4">
              <form action="{{ $action }}" method="post" class="row g-4" style="max-width: 1200px; margin: auto;">
                @if($method === 'edit')
                @method('put')
                @endif
                @csrf
                <x-form_error />
                <!-- Vùng 1: Thông tin cơ bản -->
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3">
                      <h5 class="fw-bold text-primary">Thông tin cơ bản</h5>
                    </div>
                    <div class="col-md-9">
                      <fieldset class="p-3 border rounded">
                        <div class="row">

                          <div class="col-md-6 mb-3">
                            <x-input-label name="name" placeholder="Enter Your Name" label="Name"
                              :value="old('name', ($data['name']) ?? '')" :required="true" />
                          </div>

                          <div class="col-md-6 mb-3">
                            <x-select-label name="gender" label="Gender"
                              :value="old('gender', ($data['gender']) ?? '' )" :options="__('data.gender')"
                              style="width: 100%" required />
                            @error('gender')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <x-input-label name="avatar" placeholder="Enter Your Avatar URL" label="Avatar"
                              :value="old('avatar' , ($data['avatar']) ?? '')" :required="true" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label type="" name="phone" placeholder="Enter Your Phone" label="Phone"
                              :value="old('phone' , ($data['phone']) ?? '')" :required="true" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label name="email" placeholder="Enter Your Email" label="Email"
                              :value="old('email' , ($data['email']) ?? '')" :required="true" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label type="date" name="date" placeholder="Enter Your Date of Birth"
                              label="Date of Birth" :value="old('date', ($data['date']) ?? '')" :required="true" />
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>

                <!-- Vùng 2: Thông tin nâng cao -->
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3">
                      <h5 class="fw-bold text-primary">Thông tin nâng cao</h5>
                    </div>
                    <div class="col-md-9">
                      <fieldset class="p-3 border rounded">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <x-input-label type="password" name="password" placeholder="Enter Your Password"
                              label="Password" :required="true" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label type="password" name="password_confirmation"
                              placeholder="Confirm Your Password" label="Confirm Password" :required="true" />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label name="client" placeholder="Enter Your Client Key" label="Client Key"
                              :value="old('client')" :required="true" @disabled(true) />
                          </div>
                          <div class="col-md-6 mb-3">
                            <x-input-label name="secret" placeholder="Enter Your Secret Key" label="Secret Key"
                              :value="old('secret')" :required="true" @disabled(true) />
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>

                <!-- Vùng 3: Địa chỉ -->
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-3">
                      <h5 class="fw-bold text-primary">Địa chỉ</h5>
                    </div>
                    <div class="col-md-9">
                      <fieldset class="p-3 border rounded">
                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <x-select-address-label name="province" label="Tỉnh/Thành phố" :options="__('data.address')"
                              :value="old('province')" :required="true" @readonly(true) />
                          </div>
                          <div class="col-md-4 mb-3">
                            <x-select-address-label name="district" label="Quận/Huyện" :options="__('data.address')"
                              :value="old('district')" :required="true" @readonly(true) />
                          </div>
                          <div class="col-md-4 mb-3">
                            <x-select-address-label name="ward" label="Xã/Phường" :options="__('data.address')"
                              :value="old('ward')" :required="true" @readonly(true) />
                          </div>
                          <div class="col-md-12 mb-3">
                            <x-input-label name="detail_address" placeholder="Enter Your Detailed Address"
                              label="Địa chỉ chi tiết" :value="old('detail_address' , ($data['detail_address']) ?? '')"
                              :required="true" />
                          </div>
                          <div class="col-md-12 mb-3">
                            <x-textarea-label name="note" label="Ghi Chú" :value="old('note', ($data['note']) ?? '')" />
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
