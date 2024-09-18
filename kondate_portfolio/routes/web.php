<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuOptionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
