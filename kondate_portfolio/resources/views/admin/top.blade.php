<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success text-green-500">
            {{ session('success') }}
        </div>
    @endif
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立候補を登録してください</h1>
            </div>
            <div class="p-2 w-full">
                <button
                    onclick="location.href='{{ route('admin.menu_options.create') }}'"
                    class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-4">
                    献立候補 新規登録
                </button>
            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-wrap -mx-4">
                <!-- メイン料理一覧 -->
                <div class="w-full lg:w-1/2 px-4">
                    <div class="flex flex-col text-center w-full mb-6">
                        <h2 class="sm:text-2xl text-xl font-medium title-font mb-2 text-gray-900">メイン料理</h2>
                    </div>
                    <div class="overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap mb-8">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 bg-gray-100">ID</th>
                                    <th class="px-4 py-3 bg-gray-100">献立名</th>
                                    <th class="px-4 py-3 bg-gray-100">編集</th>
                                    <th class="px-4 py-3 bg-gray-100">削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu_options->where('dish_type', 'main') as $menu_option)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $menu_option->id }}</td>
                                    <td class="px-4 py-3">{{ $menu_option->dish_name }}</td>
                                    <td class="px-4 py-3">
                                        <button
                                            onclick="location.href='{{ route('admin.menu_options.edit', ['menu_optionId' => $menu_option->id]) }}'"
                                            class="text-white bg-yellow-500 border-0 py-2 px-4 focus:outline-none hover:bg-yellow-600 rounded">
                                            編集
                                        </button>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form method="POST" action="{{ route('admin.menu_options.destroy', ['menu_optionId' => $menu_option->id]) }}">
                                            @csrf
                                            <button type="submit" class="text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded">
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
                <!-- サブ料理一覧 -->
                <div class="w-full lg:w-1/2 px-4">
                    <div class="flex flex-col text-center w-full mb-6">
                        <h2 class="sm:text-2xl text-xl font-medium title-font mb-2 text-gray-900">サブ料理</h2>
                    </div>
                    <div class="overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap mb-8">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 bg-gray-100">ID</th>
                                    <th class="px-4 py-3 bg-gray-100">献立名</th>
                                    <th class="px-4 py-3 bg-gray-100">編集</th>
                                    <th class="px-4 py-3 bg-gray-100">削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu_options->where('dish_type', 'sub') as $menu_option)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $menu_option->id }}</td>
                                    <td class="px-4 py-3">{{ $menu_option->dish_name }}</td>
                                    <td class="px-4 py-3">
                                        <button
                                            onclick="location.href='{{ route('admin.menu_options.edit', ['menu_optionId' => $menu_option->id]) }}'"
                                            class="text-white bg-yellow-500 border-0 py-2 px-4 focus:outline-none hover:bg-yellow-600 rounded">
                                            編集
                                        </button>
                                    </td>
                                    <td class="px-4 py-3">
                                        <form method="POST" action="{{ route('admin.menu_options.destroy', ['menu_optionId' => $menu_option->id]) }}">
                                            @csrf
                                            <button type="submit" class="text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded">
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
    </section>
</x-admin-layout>
