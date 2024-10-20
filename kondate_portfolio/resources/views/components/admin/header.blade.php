<header class="bg-red-400 text-white">
    <div class="container mx-auto flex flex-wrap p-3 flex-col md:flex-row items-center">
        <a href="{{ route('user.index') }}" class="flex title-font font-medium items-center mb-2 md:mb-0">
            <img src="{{ asset('images/WeellyMealPlanner-2.png') }}" alt="Logo" class="w-12 h-12 p-1 rounded-full">
            <span class="ml-3 text-2xl">週間献立プランナー</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <button
                onclick="location.href='{{ route('user.dishes') }}'"
                class="mr-5 hover:text-gray-300">
                マイ献立追加・削除
            </button>
            <button
                onclick="location.href='{{ route('admin.top') }}'"
                class="mr-5 hover:text-gray-300">
                献立候補編集
            </button>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:text-gray-300">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</header>
