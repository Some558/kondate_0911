<x-admin-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-6">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立新規登録</h1>
            </div>
            <form method="POST" action="{{ route('admin.menu_options.store')}}">
                @csrf
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        @for ($i = 0; $i < 4; $i++) <!-- 必要な数だけ繰り返し -->
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name_{{ $i }}" class="leading-7 text-sm text-gray-600">献立名</label>
                                    <input type="text" id="name_{{ $i }}" name="names[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="type_{{ $i }}" class="leading-7 text-sm text-gray-600">献立タイプ</label>
                                    <select id="type_{{ $i }}" name="types[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="main">main</option>
                                        <option value="sub">sub</option>
                                        <!-- 必要に応じて他のオプションを追加 -->
                                    </select>
                                </div>
                            </div>
                        @endfor
                        <div class="p-6 w-full">
                            <button type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">
                                献立登録
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>

