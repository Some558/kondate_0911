<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    //ユーザーログイン画面表示
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    //ユーザーログイン処理
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    //管理者ログイン画面表示
    Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])
    ->name('admin.login');
    //管理者ログイン処理
    Route::post('/admin/login', [LoginController::class, 'adminLogin']);

});

Route::middleware('auth')->group(function () {
    //ログアウト処理
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


