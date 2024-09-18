<x-admin-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">{{$menu_option->dish_name}}</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    {{ $menu_option->dish_type}}
                </p>
            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-6">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立編集</h1>
            </div>
            <form method="POST" action="{{ route('admin.menu_options.update', ['menu_optionId' => $menu_option->id])}}">
                @csrf
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">献立名</label>
                                    <input type="text" id="name" name="name" value="{{ is_null(old('name')) ? $menu_option->name : old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="type" class="leading-7 text-sm text-gray-600">献立タイプ</label>
                                    <select id="type" name="type" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="main">main</option>
                                        <option value="sub">sub</option>
                                    </select>
                                </div>
                            </div>
                        <div class="p-6 w-full">
                            <button
                            type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">
                                更新
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>

