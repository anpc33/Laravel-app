<?php

namespace App\Http\Services;

use App\Http\Repositories\Auth\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
  protected $authRepository;

  public function __construct(AuthRepository $authRepository)
  {
    $this->authRepository = $authRepository;
  }

  public function login(array $credentials, string $guard): bool
  {
    // dd($credentials);
    return Auth::guard($guard)->attempt($credentials);
  }
}


/*
    3 tác nhân
    ADMIN: http://127.0.0.1:8000/admin Auth::guard('web')->user()
-

    CUSTOMER: http://127.0.0.1:8000/customer/admin --> xong --> http://127.0.0.1:8000/dashboard // Multiple Authenticate


    Auth::guard('c')->user()
    SELLER\

    email và mật khẩu đều nằm trong bảng users

*/
