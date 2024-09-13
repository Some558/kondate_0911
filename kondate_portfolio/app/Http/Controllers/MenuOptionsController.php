<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu_OptionsRequest;
use App\Http\Requests\UpdateMenu_OptionsRequest;
use App\Models\Menu_Options;

class MenuOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * 献立新規登録画面表示
     */
    public function create()
    {
        return view('admin.menu_options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenu_OptionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu_Options $menu_Options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu_Options $menu_Options)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenu_OptionsRequest $request, Menu_Options $menu_Options)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu_Options $menu_Options)
    {
        //
    }
}
