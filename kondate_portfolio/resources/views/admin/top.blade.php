<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success text-green-500">
            {{ session('success') }}
        </div>
    @endif
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立候補を登録して下さい</h1>
            </div>
            <div class="p-2 w-full">
                <button
                    onclick="location.href='{{ route('admin.menu_options.create') }}'"
                    class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mb-4">
                    献立候補_新規登録
                </button>
            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">献立候補一覧</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">献立名</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">献立タイプ</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">編集</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3">ラーメン</td>
                            <td class="px-4 py-3">main</td>
                            <td class="px-4 py-3 text-lg text-gray-900">
                                <button class="flex mr-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">編集</button>
                            </td>
                            <td class="px-4 py-3 text-lg text-gray-900">
                                <button class="flex mr-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">削除</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-admin-layout>
