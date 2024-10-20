<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success text-green-500">
            {{ session('success') }}
        </div>
    @endif
    <section class="text-gray-700 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="text-3xl font-bold title-font mb-4 text-gray-900">献立候補を登録してください</h1>
                <button
                    onclick="location.href='{{ route('admin.menu_options.create') }}'"
                    class="mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                    献立候補 新規登録
                </button>
            </div>
            <div class="flex flex-wrap -mx-4">
                <!-- メイン料理一覧 -->
                <div class="w-full lg:w-1/2 px-4 mb-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-semibold text-gray-900">メイン料理</h2>
                        </div>
                        <div class="overflow-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-600">献立名</th>
                                        <th class="px-4 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // 日本語のあいうえお順にソート
                                        $main_menu_options = $menu_options->where('dish_type', 'main')->sort(function ($a, $b) {
                                            return mb_convert_kana($a->dish_name, 'cH') <=> mb_convert_kana($b->dish_name, 'cH');
                                        });
                                    @endphp
                                    @foreach ($main_menu_options as $menu_option)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-3 text-gray-800">{{ $menu_option->dish_name }}</td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <button
                                                onclick="location.href='{{ route('admin.menu_options.edit', ['menu_optionId' => $menu_option->id]) }}'"
                                                class="text-green-600 hover:text-indigo-900">
                                                編集
                                            </button>
                                            <form method="POST" action="{{ route('admin.menu_options.destroy', ['menu_optionId' => $menu_option->id]) }}">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    削除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- サブ料理一覧 -->
                <div class="w-full lg:w-1/2 px-4 mb-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-semibold text-gray-900">サブ料理</h2>
                        </div>
                        <div class="overflow-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-600">献立名</th>
                                        <th class="px-4 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // 日本語のあいうえお順にソート
                                        $sub_menu_options = $menu_options->where('dish_type', 'sub')->sort(function ($a, $b) {
                                            return mb_convert_kana($a->dish_name, 'cH') <=> mb_convert_kana($b->dish_name, 'cH');
                                        });
                                    @endphp
                                    @foreach ($sub_menu_options as $menu_option)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-3 text-gray-800">{{ $menu_option->dish_name }}</td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <button
                                                onclick="location.href='{{ route('admin.menu_options.edit', ['menu_optionId' => $menu_option->id]) }}'"
                                                class="text-green-600 hover:text-indigo-900">
                                                編集
                                            </button>
                                            <form method="POST" action="{{ route('admin.menu_options.destroy', ['menu_optionId' => $menu_option->id]) }}">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    削除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
