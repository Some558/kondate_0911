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
        $menu_options = MenuOptions::all(); // Menu_Optionsモデルを使用
        // メインメニューを取得（menu_optionsのtypeが'main'のもの）
        $mainMenus = UserDishes::with('menuOption') // menuOptionは関連するMenuOptionsモデル
            ->where('user_id', auth()->id()) // 現在のユーザーのIDでフィルタリング
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'main'); // dish_typeが'main'のものをフィルタリング
            })
            ->get();

        // サブメニューを取得（menu_optionsのtypeが'sub'のもの）
        $subMenus = UserDishes::with('menuOption') // menuOptionは関連するMenuOptionsモデル
            ->where('user_id', auth()->id()) // 現在のユーザーのIDでフィルタリング
            ->whereHas('menuOption', function($query) {
                $query->where('dish_type', 'sub'); // dish_typeが'sub'のものをフィルタリング
            })
            ->get();

        return view('user.menu', [
            'menu_options' => $menu_options,
            'mainMenus' => $mainMenus, // 取得したメインメニューをビューに渡す
            'subMenus' => $subMenus // 取得したサブメニューをビューに渡す
        ]);
    }
    public function keep(Request $request)
{
    // フォームから送信されたデータを取得
    $main_menu_id = $request->input('main_menu');
    $sub_menu_1_id = $request->input('sub_menu_1');
    $sub_menu_2_id = $request->input('sub_menu_2');

    // menu_optionsから選択されたメニューオプションを取得
    $mainMenu = MenuOptions::find($main_menu_id);
    $subMenu1 = MenuOptions::find($sub_menu_1_id);
    $subMenu2 = MenuOptions::find($sub_menu_2_id);

    // メインメニューとサブメニューを再取得
    $mainMenus = UserDishes::with('menuOption')
        ->where('user_id', auth()->id())
        ->whereHas('menuOption', function($query) {
            $query->where('dish_type', 'main');
        })
        ->get();

    $subMenus = UserDishes::with('menuOption')
        ->where('user_id', auth()->id())
        ->whereHas('menuOption', function($query) {
            $query->where('dish_type', 'sub');
        })
        ->get();

    return view('user.menu', [
        'mainMenus' => $mainMenus, // 再取得したメインメニューをビューに渡す
        'subMenus' => $subMenus, // 再取得したサブメニューをビューに渡す
        'mainMenu' => $mainMenu, // 選択されたメインメニューをビューに渡す
        'subMenu1' => $subMenu1, // 選択されたサブメニュー1をビューに渡す
        'subMenu2' => $subMenu2, // 選択されたサブメニュー2をビューに渡す
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
        // //ユーザーIDを取得（認証済みユーザー）
        // $userId = auth()->id();
        // // ユーザー毎の献立を取得
        // $user_dishes = UserDishes::all(); // UserDishesモデルを使用
        // // menu_option_idを取得（フォームから送信された値）
        // $useeMenuId = $request->input('main_menu,sub_menu_1,sub_menu_2'); // フォームから送信されたmenuを取得
        // // 新しい曜日毎のユーザー献立を作成
        // $userMenus = new UserMenus();
        // $userMenus->user_id = $userId; // 認証済みユーザーのIDを設定
        // $userMenus->user_menu_id = $userMenuId; // フォームから送信されたuser_menu_idを設定
        // // 献立を保存
        // $userMenus->save();
        // // user_menu_idを取得
        // $userMenuId = $userMenus->id; // 保存した後に主キーを取得
        // // 成功メッセージをセッションに追加
        // session()->flash('success', '献立が保存されました。');
        // // リダイレクト（例: 献立一覧ページ）
        // return redirect()->route('user.index'); // 適切なルートにリダイレクト
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
