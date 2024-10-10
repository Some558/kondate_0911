<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserMenuRequest;
use App\Http\Requests\UpdateUserMenuRequest;
use App\Models\UserDishes;
use App\Models\UserMenu;
use App\Models\MenuOptions;
use Illuminate\Http\Request;

class UserMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 献立候補を取得
        $menu_options = MenuOptions::all();

        // メインメニューを取得
        $mainMenus = UserDishes::with('menuOption')
            ->where('user_id', auth()->id())
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'main');
            })
            ->get();

        // サブメニューを取得
        $subMenus = UserDishes::with('menuOption')
            ->where('user_id', auth()->id())
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'sub');
            })
            ->get();

        // 現在のユーザーの献立を取得
        $userMenus = UserMenu::where('user_id', auth()->id())->get();
        $userDishes = UserDishes::where('user_id', auth()->id())->get();

        return view('user.menu', [
            'menu_options' => $menu_options,
            'mainMenus' => $mainMenus,
            'subMenus' => $subMenus,
            'userMenus' => $userMenus,
            'userDishes' => $userDishes
        ]);
    }

    /**
     * 献立を保存するメソッド
     */
    public function keep(Request $request)
    {
        // フォームから送信されたデータを取得
        $main_menu_id = $request->input('main_menu');
        $sub_menu_1_id = $request->input('sub_menu_1');
        $sub_menu_2_id = $request->input('sub_menu_2');
        $day_of_week = $request->input('day_of_week'); // 曜日を取得

        // menu_optionsから選択されたメニューオプションを取得（必要であれば）
        $mainMenu = MenuOptions::find($main_menu_id);
        $subMenu1 = MenuOptions::find($sub_menu_1_id);
        $subMenu2 = MenuOptions::find($sub_menu_2_id);

        // ユーザーの献立を保存する処理
        $userMenu = new UserMenu();
        $userMenu->user_id = auth()->id(); // 現在のユーザーIDを設定
        $userMenu->day_of_week = $day_of_week; // 曜日を設定
        $userMenu->main_dish_id = $main_menu_id; // メインディッシュのIDを設定
        $userMenu->sub_dish1_id = $sub_menu_1_id; // サブディッシュ1のIDを設定
        $userMenu->sub_dish2_id = $sub_menu_2_id; // サブディッシュ2のIDを設定
        $userMenu->save(); // 保存

        // 現在のタブ情報をセッションに保存し、成功メッセージも設定
        return redirect()->back()
            ->with('active_tab', $day_of_week)
            ->with('success', '献立が保存されました。');
    }

    /**
     * 献立をランダムに保存するメソッド
     */
    public function randomKeep(Request $request)
    {
        // 曜日をリクエストから取得
        $day_of_week = $request->input('day_of_week'); // リクエストから曜日を取得

        // ランダムにメインメニューを取得
        $mainMenuRandom = UserDishes::where('user_id', auth()->id())
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'main'); // dish_typeが'main'のものをフィルタリング
            })
            ->inRandomOrder()
            ->first();

        // ランダムにサブメニュー1を取得
        $subMenu1Random = UserDishes::where('user_id', auth()->id())
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'sub'); // dish_typeが'sub'のものをフィルタリング
            })
            ->inRandomOrder()
            ->first();

        // ランダムにサブメニュー2を取得（サブメニュー1と重複しないように）
        $subMenu2Random = UserDishes::where('user_id', auth()->id())
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'sub'); // dish_typeが'sub'のものをフィルタリング
            })
            ->where('menu_option_id', '!=', $subMenu1Random->menu_option_id) // サブメニュー1のIDを除外
            ->inRandomOrder()
            ->first();

        // メニューが取得できているか確認
        if (!$mainMenuRandom || !$subMenu1Random || !$subMenu2Random) {
            return redirect()->back()
                ->with('active_tab', $day_of_week)
                ->with('error', 'メニューが見つかりませんでした。');
        }

        // ユーザーの献立を保存する処理
        $userMenu = new UserMenu();
        $userMenu->user_id = auth()->id(); // 現在のユーザーIDを設定
        $userMenu->day_of_week = $day_of_week; // 曜日を設定
        $userMenu->main_dish_id = $mainMenuRandom->menu_option_id; // メインディッシュのIDを設定
        $userMenu->sub_dish1_id = $subMenu1Random->menu_option_id; // サブディッシュ1のIDを設定
        $userMenu->sub_dish2_id = $subMenu2Random->menu_option_id; // サブディッシュ2のIDを設定
        $userMenu->save(); // 保存

        // 現在のタブ情報をセッションに保存し、成功メッセージも設定
        return redirect()->back()
            ->with('active_tab', $day_of_week)
            ->with('success', 'ランダムな献立が保存されました。');
    }

    // 他のメソッドは省略
}
