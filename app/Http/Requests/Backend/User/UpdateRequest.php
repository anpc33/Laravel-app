<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|string|max:255',
      // 'gender' => 'required|in:1,2',
      // 'avatar' => 'required',
      // 'phone' => 'required|numeric|digits_between:10,15',
      // 'email' => 'required|email|unique:users,email',
      // 'date' => 'required|date',
      // 'password' => 'required|min:6|confirmed',
      // 'password_confirmation' => 'required|min:6',
      // 'province' => 'required',
      // 'district' => 'required',
      // 'ward' => 'required',
      // 'detail_address' => 'required|string|max:500',
      // 'ghichu' => 'nullable|string|max:1000',
    ];
  }

  /**
   * Customize the attribute names for validation errors.
   *
   * @return array<string, string>
   */
  public function attributes(): array
  {
    return [
      'name' => 'Tên',
      // 'gender' => 'Giới tính',
      // 'avatar' => 'Ảnh đại diện',
      // 'phone' => 'Số điện thoại',
      // 'email' => 'Email',
      // 'date' => 'Ngày sinh',
      // 'password' => 'Mật khẩu',
      // 'password_confirmation' => 'Xác nhận mật khẩu',
      // 'province' => 'Tỉnh/Thành phố',
      // 'district' => 'Quận/Huyện',
      // 'ward' => 'Xã/Phường',
      // 'detail_address' => 'Địa chỉ chi tiết',
      // 'ghichu' => 'Ghi chú',
    ];
  }


}
