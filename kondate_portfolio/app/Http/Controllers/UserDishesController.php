<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDishesRequest;
use App\Http\Requests\UpdateUserDishesRequest;
use App\Models\UserDishes;
use App\Models\Menu_Options;
use Illuminate\Http\Request;

class UserDishesController extends Controller
{
    /**
     * 献立候補一覧画面表示
     */
    public function index()
    {
        //献立候補を取得
        $menu_options = Menu_Options::all(); // Menu_Optionsモデルを使用
        return view('user.dishes', [
            'menu_options' => $menu_options
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
    public function store(StoreUserDishesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDishes $userDishes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDishes $userDishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDishesRequest $request, UserDishes $userDishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDishes $userDishes)
    {
        //
    }
}
