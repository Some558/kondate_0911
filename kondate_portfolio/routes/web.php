<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuOptionsController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\UserDishesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

//ユーザー画面
Route::prefix('user')->name('user.')->middleware('auth')->group(function() {
    // 献立ページ表示
    Route::get('index', [UserMenuController::class, 'index'])->name('index');
    // 献立候補登録ページ表示
    Route::get('dishes', [UserDishesController::class, 'index'])->name('dishes');
    // ユーザー毎献立候補新規登録
    Route::post('dishes', [UserDishesController::class, 'store'])->name('dishes.store');
    //ユーザー毎献立候補削除
    Route::delete('dishes/{id}', [UserDishesController::class, 'destroy'])->name('dishes.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.top');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //管理画面トップページ
    Route::get('top', [MenuOptionsController::class,'top'])->name('top');

    //献立管理
    Route::prefix('menu_options')->name('menu_options.')->group(function(){
        //献立新規登録画面
        Route::get('create' , [MenuOptionsController::class, 'create'])->name('create');
        //献立新規登録処理
        Route::post('store' , [MenuOptionsController::class, 'store'])->name('store');
        //献立編集画面
        Route::get('{menu_optionId}/edit',[MenuOptionsController::class, 'edit'])->name('edit');
        //献立更新処理
        Route::post('{menu_optionId}/update',[MenuOptionsController::class, 'update'])->name('update');
        //献立削除処理
        Route::post('{menu_optionId}/destroy',[MenuOptionsController::class, 'destroy'])->name('destroy');
    });
});
