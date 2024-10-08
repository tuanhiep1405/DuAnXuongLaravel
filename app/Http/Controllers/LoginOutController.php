<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginOutController extends Controller
{
    public function login(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Kiểm tra sự tồn tại của người dùng
    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return back()->withErrors(['username' => 'Tài khoản không tồn tại.']);
    }

    // Kiểm tra mật khẩu
    if (!password_verify($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Mật khẩu không chính xác.']);
    }

    // Đăng nhập
    Auth::login($user);

    return redirect()->route('/')->with('success', 'Đăng nhập thành công!');
}
}
