<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDishesRequest;
use App\Http\Requests\UpdateUserDishesRequest;
use App\Models\UserDishes;
use App\Models\MenuOptions;
use Illuminate\Http\Request;

class UserDishesController extends Controller
{
    /**
     * 献立候補一覧画面表示
     */
    public function index()
    {
        //献立候補を取得
        $menu_options = MenuOptions::all(); // Menu_Optionsモデルを使用
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
        //ユーザー毎献立候補新規登録
        //ユーザーIDを取得（認証済みユーザー）
        $userId = auth()->id();

        // menu_option_idを取得（フォームから送信された値）
        $menuOptionId = $request->input('menu_option_id'); // フォームから送信されたmenu_option_idを取得

        // すでに同じ献立候補が存在するか確認
        $existingDish = UserDishes::where('user_id', $userId)
        ->where('menu_option_id', $menuOptionId)
        ->first();

        if ($existingDish) {
            session()->flash('error', 'この献立候補はすでに追加されています。');
            return redirect()->route('user.dishes');
        }

        // 新しいユーザー献立を作成
        $userDishes = new UserDishes();
        $userDishes->user_id = $userId; // 認証済みユーザーのIDを設定
        $userDishes->menu_option_id = $menuOptionId; // フォームから送信されたmenu_option_idを設定

        // 献立を保存
        $userDishes->save();

        // user_menu_idを取得
        $userMenuId = $userDishes->user_menu_id; // 保存した後に主キーを取得

        // 成功メッセージをセッションに追加
        session()->flash('success', '献立候補が追加されました。');

        // リダイレクト（例: 献立一覧ページ）
        return redirect()->route('user.dishes'); // 適切なルートにリダイレクト

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
        //ユーザー毎の献立候補から削除する
        public function destroy($userMenuId)
        {
            $userDishes = UserDishes::where('user_menu_id', $userMenuId)->firstOrFail();
            $userDishes->delete();
            session()->flash('success', '献立候補が削除されました。');
            return redirect()->route('user.dishes');
        }
    }

