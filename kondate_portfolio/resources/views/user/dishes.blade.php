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
                {{-- マイ献立に登録されているメインメニューをすべて表示する --}}
                @foreach ($mainMenus as $mainMenu)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-800">{{ $menu_option->dish_name }}</td>
                </tr>
                @endforeach
        </form>
    </div>
</x-user-layout>
