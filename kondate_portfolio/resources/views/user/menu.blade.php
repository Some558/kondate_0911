@php
use App\Models\UserDishes;
use App\Models\MenuOptions;
@endphp
<x-user-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">週間メニュープランナー</h1>
                <p class="text-gray-600">1週間の献立を簡単に計画できます</p>
            </div>

            <!-- タブナビゲーション -->
            <div id="tabs" class="flex justify-around space-x-2 rounded-full bg-yellow-500/20 p-2 mb-8">
                @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                    <div class="tab w-full rounded-full py-3 text-lg font-semibold leading-5 text-blue-700 cursor-pointer text-center hover:bg-yellow-500 hover:text-white transition duration-300" data-tab="{{ $day }}">
                        {{ $day }}
                    </div>
                @endforeach
            </div>

            <!-- タブコンテンツ -->
            @foreach(['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'] as $day)
                <div id="{{ $day }}" class="tab-content mt-6 hidden">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <!-- 現在のメニュー表示部分 -->
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
                            <h2 class="text-2xl font-bold mb-4">{{ $day }}曜日の現在の献立</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @php
                                    $mealTypes = [
                                        ['title' => 'メインメニュー', 'key' => 'main_dish_id', 'icon' => '🍽️'],
                                        ['title' => 'サブメニュー1', 'key' => 'sub_dish1_id', 'icon' => '🥗'],
                                        ['title' => 'サブメニュー2', 'key' => 'sub_dish2_id', 'icon' => '🥘']
                                    ];
                                @endphp

                                @foreach($mealTypes as $meal)
                                    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-4 border border-white border-opacity-20">
                                        <div class="flex items-center mb-2">
                                            <span class="text-2xl mr-2">{{ $meal['icon'] }}</span>
                                            <h3 class="font-medium">{{ $meal['title'] }}</h3>
                                        </div>
                                        @php
                                        // 最新の user_menus レコードを取得
                                        $latestUserMenu = $userMenus->where('day_of_week', $day)
                                            ->sortByDesc('created_at')  // created_at で降順にソート
                                            ->first();  // 最新のレコードを取得

                                        // 各メニュータイプに対応する料理名を取得
                                        $dishName = $latestUserMenu && $latestUserMenu->{$meal['key']}
                                            ? MenuOptions::find($latestUserMenu->{$meal['key']})->dish_name
                                            : '未設定';
                                        @endphp
                                        <p class="text-lg font-semibold">{{ $dishName }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- メニュー選択フォーム -->
                        <form action="{{ route('user.menu.keep') }}" method="POST" class="p-6">
                            @csrf
                            <input type="hidden" name="day_of_week" value="{{ $day }}">

                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">新しいメニューを選択</h2>
                                <p class="text-gray-600 mb-4">お好みのメニューを選択するか、ランダムに生成できます。</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <h3 class="font-semibold mb-4 text-lg">メインメニュー <i class="fas fa-drumstick-bite ml-2 text-yellow-500"></i></h3>
                                    <select name="main_menu" class="w-full p-3 border rounded-lg bg-yellow-50">
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
                                    <h3 class="font-semibold mb-4 text-lg">サブメニュー1 <i class="fas fa-leaf ml-2 text-yellow-500"></i></h3>
                                    <select name="sub_menu_1" class="w-full p-3 border rounded-lg bg-yellow-50">
                                        @foreach($subMenus as $subMenu)
                                            <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <h3 class="font-semibold mb-4 text-lg">サブメニュー2 <i class="fas fa-carrot ml-2 text-yellow-500"></i></h3>
                                    <select name="sub_menu_2" class="w-full p-3 border rounded-lg bg-yellow-50">
                                        @foreach($subMenus as $subMenu)
                                            <option value="{{ $subMenu->menu_option_id }}">{{ $subMenu->menuOption->dish_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-8 flex space-x-4">
                                <button type="submit" class="keep flex-1 bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-save mr-2"></i>選択したメニューを保存
                                </button>
                            </form>
                            <form action="{{ route('user.menu.randomkeep') }}" method="POST">
                                @csrf
                                <button type="submit" input type="hidden" name="day_of_week" value="{{ $day }}" class="random flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                                    <i class="fas fa-random mr-2"></i>ランダムに保存
                                </button>
                            </form>
                            </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="mt-12 text-center">
                <form action="{{ route('user.menu.weekrandom') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" id="week-random" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        <i class="fas fa-random mr-2"></i>1週間分をランダムに設定
                    </button>
                </form>
            </div> --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</x-user-layout>
