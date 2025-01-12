<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\AuthRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function authenticate(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $guard = 'web'; // Khoanh vùng những ông nào đăng nhập theo kiểu vào trang admin
        if ($this->authService->login($credentials, $guard)) {
            return redirect()->route('dashboard.index')->with('success', __('messages.auth.success'));
        }
        return back()->with('error', __('messages.auth.failed'));
    }

    // - Nếu login rồi thì sẽ không thể truy cập trang login.
    public function CheckLog()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }
        return view('backend.login');
    }
}
