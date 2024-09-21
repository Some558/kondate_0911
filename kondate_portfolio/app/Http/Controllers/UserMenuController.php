<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserMenuRequest;
use App\Http\Requests\UpdateUserMenuRequest;
use App\Models\UserMenu;

class UserMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //献立表示を取得
        $usermenu = usermenu::get();
        return view('user.menu', [
            'usermenu' => $usermenu
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
