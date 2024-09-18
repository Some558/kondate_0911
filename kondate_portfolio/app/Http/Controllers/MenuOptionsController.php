<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu_OptionsRequest;
use App\Http\Requests\UpdateMenu_OptionsRequest;
use App\Models\Menu_Options;
use Illuminate\Http\Request;

class MenuOptionsController extends Controller
{
    /**
     * 管理画面トップページ兼献立一覧表示
     **/
    public function top()
    {
        //献立一覧を取得
        $menu_options = Menu_Options::get();
        return view('admin.top', [
            'menu_options' => $menu_options
        ]);
    }

    /**
     * 献立新規登録画面表示
     */
    public function create()
    {
        return view('admin.menu_options.create');
    }

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
     * show
     */
    public function show(Menu_Options $menu_Options)
    {
        //
    }

    /**
     * 献立編集画面表示
     */

    public function edit(Request $request, int $menu_optionId)
        {
            $menu_option = Menu_Options::findOrFail($menu_optionId);
            return view('admin.menu_options.edit', [
                'menu_option' => $menu_option
            ]);
        }

    /**
     * 献立更新処理
     */
    public function update(UpdateMenu_OptionsRequest $request, int $menu_optionId)
    {
        // dd($request);
        $menu_options = Menu_Options::findOrFail($menu_optionId);
        $menu_options->dish_name = $request->name;
        $menu_options->dish_type = $request->type;
        $menu_options->user_id   = auth()->id(); // ユーザーIDを設定
        $menu_options->save();
            return redirect()->route('admin.top', ['menu_options' => $menu_options])->with('success', '献立候補の更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu_Options $menu_Options)
    {
        //
    }
}
