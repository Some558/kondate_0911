@php
use App\Models\UserDishes;
use App\Models\MenuOptions;
@endphp
<x-user-layout>
    <!-- resources/views/weekly-menu.blade.php -->
    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weekly Menu</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 p-8">
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <div id="tabs" class="flex justify-around space-x-2 rounded-full bg-blue-500/20 p-2">
                @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                    <div class="tab w-full rounded-full py-3 text-lg font-semibold leading-5 text-blue-700 cursor-pointer text-center hover:bg-blue-500 hover:text-white transition duration-300" data-tab="{{ $day }}">
                        {{ $day }}
                    </div>
                @endforeach
            </div>
            @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                <div id="{{ $day }}" class="tab-content mt-6 hidden">
                    <h2 class="text-3xl font-bold mb-6">{{ $day }}day's menu</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <form action="{{ route('user.menu.keep') }}" method="POST">
                                @csrf
                                <input type="hidden" name="day_of_week" value="{{ $day }}"> <!-- 曜日を隠しフィールドで送信 -->
                                <h3 class="font-semibold mb-4 text-lg">メインメニュー</h3>
                                <div name="main_menu" class="w-full p-4 border rounded-lg bg-gray-50">
                                    @if($userMenus->isNotEmpty())
                                        @php
                                            $latestDishName = null; // 最後の料理名を格納する変数
                                        @endphp
                                        @foreach($userMenus as $userMenu)
                                            @if($userMenu->day_of_week == $day)
                                                @php
                                                    // 最新のuserDishを取得
                                                    $latestUserDish = UserDishes::where('menu_option_id', $userMenu->main_dish_id)
                                                        ->where('user_id', auth()->id())
                                                        ->latest() // 最新のレコードを取得
                                                        ->first(); // 最初の1件を取得
                                                @endphp
                                                @if($latestUserDish)
                                                    @php
                                                        $latestDishName = $latestUserDish->menuOption ? $latestUserDish->menuOption->dish_name : null; // 料理名を格納
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($latestDishName)
                                            <p class="text-xl">{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                        @else
                                            <p class="text-gray-500">No dish available</p>
                                        @endif
                                    @else
                                        <p class="text-gray-500">No data available</p>
                                    @endif
                                </div>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-4 text-lg">サブメニュー1</h3>
                            <div name="main_menu" class="w-full p-4 border rounded-lg bg-gray-50">
                                @if($userMenus->isNotEmpty())
                                    @php
                                        $latestDishName = null; // 最後の料理名を格納する変数
                                    @endphp
                                    @foreach($userMenus as $userMenu)
                                        @if($userMenu->day_of_week == $day)
                                            @php
                                                // 最新のuserDishを取得
                                                $latestUserDish = UserDishes::where('menu_option_id', $userMenu->sub_dish1_id)
                                                    ->where('user_id', auth()->id())
                                                    ->latest() // 最新のレコードを取得
                                                    ->first(); // 最初の1件を取得
                                            @endphp
                                            @if($latestUserDish)
                                                @php
                                                    $latestDishName = $latestUserDish->menuOption ? $latestUserDish->menuOption->dish_name : null; // 料理名を格納
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($latestDishName)
                                        <p class="text-xl">{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                    @else
                                        <p class="text-gray-500">No dish available</p>
                                    @endif
                                @else
                                    <p class="text-gray-500">No data available</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-4 text-lg">サブメニュー2</h3>
                            <div name="main_menu" class="w-full p-4 border rounded-lg bg-gray-50">
                                @if($userMenus->isNotEmpty())
                                    @php
                                        $latestDishName = null; // 最後の料理名を格納する変数
                                    @endphp
                                    @foreach($userMenus as $userMenu)
                                        @if($userMenu->day_of_week == $day)
                                            @php
                                                // 最新のuserDishを取得
                                                $latestUserDish = UserDishes::where('menu_option_id', $userMenu->sub_dish2_id)
                                                    ->where('user_id', auth()->id())
                                                    ->latest() // 最新のレコードを取得
                                                    ->first(); // 最初の1件を取得
                                            @endphp
                                            @if($latestUserDish)
                                                @php
                                                    $latestDishName = $latestUserDish->menuOption ? $latestUserDish->menuOption->dish_name : null; // 料理名を格納
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($latestDishName)
                                        <p class="text-xl">{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                    @else
                                        <p class="text-gray-500">No dish available</p>
                                    @endif
                                @else
                                    <p class="text-gray-500">No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div>
                            <form action="{{ route('user.menu.keep') }}" method="POST">
                                @csrf
                                <input type="hidden" name="day_of_week" value="{{ $day }}"> <!-- 曜日を隠しフィールドで送信 -->
                                <h3 class="font-semibold mb-4 text-lg">メインメニュー</h3>
                                <select name="main_menu" class="w-full p-3 border rounded-lg bg-gray-50">
                                    @if($mainMenus->isNotEmpty())
                                        @foreach($mainMenus as $mainMenu)
                                            <option value="{{ $mainMenu->menu_option_id }}">{{ $mainMenu->menuOption->dish_name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">No data available</option>
                                    @endif
                                </select>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-4 text-lg">サブメニュー1</h3>
                            <select name="sub_menu_1" class="w-full p-3 border rounded-lg bg-gray-50">
                                @foreach($subMenus as $subMenu)
                                    <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-4 text-lg">サブメニュー2</h3>
                            <select name="sub_menu_2" class="w-full p-3 border rounded-lg bg-gray-50">
                                @foreach($subMenus as $subMenu)
                                    <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="keep bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            <i class="fas fa-save mr-2"></i>Keep
                        </button>
                    </form>
                    <form action="{{ route('user.menu.randomkeep') }}" method="POST">
                        @csrf
                        <input type="hidden" name="day_of_week" value="{{ $day }}"> <!-- 現在の曜日を設定 -->
                        <button type="submit" class="random bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            <i class="fas fa-random mr-2"></i>Random
                        </button>
                    </form>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-12 text-center">
                <button id="week-random" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    <i class="fas fa-random mr-2"></i>1 Week Random
                </button>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.tab-content:first').removeClass('hidden');
                $('.tab:first').addClass('bg-white shadow');

                $('.tab').click(function() {
                    var tab = $(this).data('tab');
                    $('.tab-content').addClass('hidden');
                    $('#' + tab).removeClass('hidden');
                    $('.tab').removeClass('bg-white shadow');
                    $(this).addClass('bg-white shadow');
                });

                $('.keep, .random, #week-random').click(function() {
                    alert($(this).text() + ' button clicked');
                });
            });
        </script>
    </body>
    </html>
</x-user-layout>
