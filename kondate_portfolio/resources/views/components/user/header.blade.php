<header class="text-gray-600 body-font bg-blue-200">
    <div class="container mx-auto flex flex-wrap p-3 flex-col md:flex-row items-center">
        <a href="{{ route('user.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-2 md:mb-0 cursor-pointer">
            <img src="{{ asset('images/WeellyMealPlanner-2.png') }}" alt="Logo" class="w-20 h-20 text-white p-1 rounded-full">
            <span class="ml-3 text-xl">週間献立プランナー</span>
        </a>
        <button
        {{-- 献立編集画面に遷移 --}}
        onclick="location.href='{{ route('user.dishes') }}'"
        class="flex ml-auto text-white bg-gray-700 border-0 py-1.5 px-4 focus:outline-none hover:bg-gray-900 rounded">
            献立候補登録
        </button>
        <form method="POST" action="{{ route('logout') }}" class='md:ml-auto'>
            @csrf
            <button
                :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();"
                class="inline-flex items-center text-white bg-gray-700 border-0 py-0.5 px-2 focus:outline-none hover:bg-gray-800 rounded text-base mt-2 md:mt-0">
                Logout
            </button>
        </form>
    </div>
</header>
