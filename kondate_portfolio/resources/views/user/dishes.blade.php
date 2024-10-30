<!-- 献立候補追加+献立候補からマイ献立追加画面から、
マイ献立を直接追加・マイ献立一覧表示画面に変更する
今後はこちらをメインで使う予定-->
<x-user-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- 献立候補を選択するセクション -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">マイ献立一覧</h1>
            <a href="{{ route('user.index') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                週間献立画面に戻る
            </a>
        </div>
        <form method="GET" action="{{ route('user.indexall') }}">
            @csrf
            <div class="overflow-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="border-b hover:bg-gray-50">
                            <th class="px-4 py-3 bg-gray-100 text-gray-800">メインメニュー</th>
                            <th class="px-4 py-3 bg-gray-100 text-gray-800">サブメニュー</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userDishes->groupBy('menuOption.dish_type') as $type => $dishes)
                            @if ($type == 'main')
                                @foreach ($dishes as $index => $mainDish)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-3 text-gray-800">
                                            {{ $mainDish->menuOption->dish_name ?? '' }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800">
                                            {{ $userDishes->where('menuOption.dish_type', 'sub')->skip($index)->first()->menuOption->dish_name ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</x-user-layout>
