<?php

namespace App\Http\Repositories\Auth;

use App\Models\User;

class AuthRepository
{
    public function findByEmail(string $email)
    {
        // Tìm user theo email
        return User::where('email', $email)->first();
    }

    public function validatePassword(User $user, string $password): bool
    {
        // Kiểm tra xem mật khẩu có khớp không
        return password_verify($password, $user->password);
    }
}
