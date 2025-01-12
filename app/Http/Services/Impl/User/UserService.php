<?php

namespace App\Http\Services\Impl\User;

use App\Http\Repositories\User\UserRepository;
use App\Http\Services\BaseService;

class UserService extends BaseService
{

  protected UserRepository $userRepository;
  public function __construct(UserRepository $userRepository)
  {
    parent::__construct($userRepository); // Truyền trực tiếp tham số vào
  }

  // Định nghĩa các trường cần loại bỏ cho UserService
  protected function getExcept(): array
  {
    return ['password_confirmation', '_token'];
  }

  protected function getSearchFields(): array
  {
    return ['name', 'email'];
  }

  protected function getPerpage(): int
  {
    return 20;
  }

  protected function getSelectSimpleFilter(): array
  {
    return ['status', 'user_catalogue_id'];
  }

  protected function getAge(): array
  {
    return [];
  }
}
