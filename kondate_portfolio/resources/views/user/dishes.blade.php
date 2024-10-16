<x-user-layout>
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-3 text-xs" role="alert">
            <p class="font-bold">成功</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-3 text-xs" role="alert">
            <p class="font-bold">エラー</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="container mx-auto px-4 py-6">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-800">献立候補を手動で追加する</h1>
        </div>
        <form method="POST" action="{{ route('admin.menu_options.store') }}">
            @csrf
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="p-2 w-full md:w-1/2">
                            <div class="relative">
                                <label for="name_{{ $i }}" class="leading-7 text-sm text-gray-600">献立名</label>
                                <input type="text" id="name_{{ $i }}" name="names[]" placeholder="例: カレーライス" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full md:w-1/2">
                            <div class="relative">
                                <label for="type_{{ $i }}" class="leading-7 text-sm text-gray-600">献立タイプ</label>
                                <select id="type_{{ $i }}" name="types[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="main">メイン</option>
                                    <option value="sub">サブ</option>
                                    <!-- 必要に応じて他のオプションを追加 -->
                                </select>
                            </div>
                        </div>
                    @endfor
                    <div class="p-6 w-full">
                        <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-3 px-10 focus:outline-none hover:bg-yellow-600 rounded-lg text-lg transition duration-300 ease-in-out transform hover:scale-105">
                            献立登録
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">献立候補を選択してください</h1>
            <a href="{{ route('user.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1 px-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                献立選択画面に戻る
            </a>
        </div>

        <form method="POST" action="{{ route('user.dishes.bulkStore') }}">
            @csrf

            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2 text-gray-700">メインメニュー</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach ($menu_options->where('dish_type', 'main') as $menu_option)
                        <div class="border rounded-lg p-4 flex flex-col items-start">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="menu_option_ids[]" value="{{ $menu_option->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">{{ $menu_option->dish_name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2 text-gray-700">サブメニュー</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach ($menu_options->where('dish_type', 'sub') as $menu_option)
                        <div class="border rounded-lg p-4 flex flex-col items-start">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="menu_option_ids[]" value="{{ $menu_option->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">{{ $menu_option->dish_name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 py-2 px-8 rounded-lg text-lg">
                    選択した献立を保存
                </button>
            </div>
        </form>
    </div>
</x-user-layout>
