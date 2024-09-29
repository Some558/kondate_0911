<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserMenuRequest;
use App\Http\Requests\UpdateUserMenuRequest;
use App\Models\UserDishes;
use App\Models\UserMenu;
use App\Models\MenuOptions;

class UserMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 献立候補を取得
        $menu_options = MenuOptions::all(); // Menu_Optionsモデルを使用
        // user_dishesからメインメニューを取得
        $mainMenus = UserDishes::with('menuOption') // menuOptionは関連するMenuOptionsモデル
            ->where('user_id', auth()->id()) // 現在のユーザーのIDでフィルタリング
            ->get();

        return view('user.menu', [
            'menu_options' => $menu_options,
            'mainMenus' => $mainMenus // 取得したメインメニューをビューに渡す
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMenu $userMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMenu $userMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserMenuRequest $request, UserMenu $userMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMenu $userMenu)
    {
        //
    }
}
