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
    </head>
    <body class="bg-gray-100 p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <div id="tabs" class="flex space-x-1 rounded-xl bg-blue-900/20 p-1">
                @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                    <div class="tab w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-blue-700 cursor-pointer" data-tab="{{ $day }}">
                        {{ $day }}
                    </div>
                @endforeach
            </div>
            @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                <div id="{{ $day }}" class="tab-content mt-4 hidden">
                    <h2 class="text-2xl font-bold mb-4">{{ $day }}曜日の献立</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <form action="{{ route('user.menu.keep') }}" method="POST">
                                @csrf
                                <input type="hidden" name="day_of_week" value="{{ $day }}"> <!-- 曜日を隠しフィールドで送信 -->
                                <h3 class="font-semibold mb-2">メインメニュー</h3>
                                <div name="main_menu" class="w-full p-2 border rounded">
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
                                            <p>{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                        @else
                                            <p>No dish available</p>
                                        @endif
                                    @else
                                        <p>No data available</p>
                                    @endif
                                </div>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">サブメニュー1</h3>
                            <div name="main_menu" class="w-full p-2 border rounded">
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
                                        <p>{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                    @else
                                        <p>No dish available</p>
                                    @endif
                                @else
                                    <p>No data available</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">サブメニュー2</h3>
                            <div name="main_menu" class="w-full p-2 border rounded">
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
                                        <p>{{ $latestDishName }}</p> <!-- 最後の料理名を表示 -->
                                    @else
                                        <p>No dish available</p>
                                    @endif
                                @else
                                    <p>No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <form action="{{ route('user.menu.keep') }}" method="POST">
                                @csrf
                                <input type="hidden" name="day_of_week" value="{{ $day }}"> <!-- 曜日を隠しフィールドで送信 -->
                                <h3 class="font-semibold mb-2">メインメニュー</h3>
                                <select name="main_menu" class="w-full p-2 border rounded">
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
                            <h3 class="font-semibold mb-2">サブメニュー1</h3>
                            <select name="sub_menu_1" class="w-full p-2 border rounded">
                                @foreach($subMenus as $subMenu)
                                    <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">サブメニュー2</h3>
                            <select name="sub_menu_2" class="w-full p-2 border rounded">
                                @foreach($subMenus as $subMenu)
                                    <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex space-x-4">
                        <button class="keep bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Keep
                        </button>
                    </form>
                        <button class="random bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Random</button>
                        <button class="delete bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </div>
                </div>
            @endforeach

            <div class="mt-8 text-center">
                <button id="week-random" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">1week_Random</button>
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

                $('.keep, .random, .delete, #week-random').click(function() {
                    alert($(this).text() + ' button clicked');
                });
            });
        </script>
    </body>
    </html>
</x-user-layout>
