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

    // public function store(StoreMenu_OptionsRequest $request)
    // {
    //     // dd('カテゴリー新規登録処理のルートです', $request);
    //     // dd($request->name, $request->type);
    //     $menu_options = new Menu_Options();
    //     $menu_options->dish_name = $request->name;
    //     $menu_options->dish_type = $request->type;
    //     $menu_options->user_id = auth()->id();
    //     $menu_options->save();

    /**
     * 献立新規登録処理
     */
    public function store(StoreMenu_OptionsRequest $request)
    {
        $names = $request->input('names');
        $types = $request->input('types');

        foreach ($names as $index => $name) {
            // 名前とタイプが空でないことを確認
            if (!empty($name) && !empty($types[$index])) {
                $menu_options = new Menu_Options();
                $menu_options->dish_name = $name;
                $menu_options->dish_type = $types[$index];
                $menu_options->user_id = auth()->id(); // ユーザーIDを設定
                $menu_options->save();
            }
        }
        // 保存成功後のメッセージをセッションに格納
        session()->flash('success', '献立候補の新規登録が完了しました。');
        // 保存成功後のメッセージをセッションに格納
        return redirect()->route('admin.top')->with('success', '献立候補の新規登録が完了しました。');
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
