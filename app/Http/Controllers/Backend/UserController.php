<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\User\StoreRequest;
use App\Http\Requests\Backend\User\UpdateRequest;
use App\Http\Services\Impl\User\UserService;
use App\Http\Controllers\Backend\BaseController;


class UserController extends BaseController
{
  private $module = 'user';
  private $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
    parent::__construct($this->userService);
  }

  protected function getStoreRequest()
  {
    return new StoreRequest();
  }

  protected function getUpdateRequest()
  {
    return new UpdateRequest(); // Chỉ định request dành riêng cho update
  }

  protected function getModule()
  {
    return $this->module;
  }

  protected function getConfig()
  {
    return [
      'filters' => $this->filterExtends(), // Lọc dữ liệu (nếu có)
      'createRoute' => route('user.create'),
      'tableHead' => $this->tableHead(), // Cấu hình đầu bảng
      'dataVariable' => $this->module . 's', // Biến dữ liệu cho view
      'breadcrumb' =>  [
        'create' => 'Thêm mới thành viên',
        'index' => 'Danh sách thành viên',
        'edit' => 'Cập nhật thành viên',
        'delete' => 'Xóa thành viên'
      ],
      'view' => [
        'save' => 'backend.user.save',
        'index' => 'backend.user.index',
      ],
    ];
  }

  private function tableHead()
  {
    return [
      'id' => 'ID',
      'name' => "Fullname",
      'email' => "Email",
      'phone' => "Phone",
      'age' => "Tuổi",
    ];
  }

  private function filterExtends()
  {
    return [
      0 => [
        'name' => 'age',
        'options' => [
          0 => 'Chọn độ tuổi',
          'gt:40' => 'Lớn hơn 40 tuổi',
          'lt:30' => 'Nhỏ hơn 30 tuổi',
          'gte:40' => 'Lớn hơn hoặc bằng 40 tuổi',
          'lte:40' => 'Nhỏ hơn hoặc bằng 40 tuổi',
          'between:10,30' => 'Từ 10 cho đến 30 tuổi'
        ]
      ],
    ];
  }
}

