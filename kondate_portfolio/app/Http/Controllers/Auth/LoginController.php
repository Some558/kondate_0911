<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ユーザーログインフォームを表示
    public function showUserLoginForm()
    {
        return view('auth.user_login');
    }

    // 管理者ログインフォームを表示
    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    // ユーザーログイン処理
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home'); // ユーザーのホームにリダイレクト
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // 管理者ログイン処理
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/top'); // 管理者のトップにリダイレクト
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
