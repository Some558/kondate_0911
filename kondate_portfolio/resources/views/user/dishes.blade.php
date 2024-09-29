@php
use App\Models\UserDishes;
@endphp

<x-user-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">献立候補</h1>
            <a href="{{ route('user.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                献立選択画面に戻る
            </a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">成功</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p class="font-bold">エラー</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($menu_options as $menu_option)
                @php
                // ここでユーザーの献立を取得
                $userDishes = UserDishes::where('menu_option_id', $menu_option->id)
                    ->where('user_id', auth()->id())
                    ->first();
                @endphp
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg relative">
                    @if (UserDishes::where('user_id', auth()->id())->where('menu_option_id', $menu_option->id)->exists())
                        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">追加済</div>
                    @endif
                    <div class="p-6">
                        <h5 class="text-xl font-semibold text-gray-800 mb-3">{{ $menu_option->dish_name }}</h5>
                        @if (!UserDishes::where('user_id', auth()->id())->where('menu_option_id', $menu_option->id)->exists())
                            <form action="{{ route('user.dishes.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_option_id" value="{{ $menu_option->id }}">
                                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    追加
                                </button>
                            </form>
                        @endif
                        @if ($userDishes)
                        <form action="{{ route('user.dishes.destroy', $userDishes->user_menu_id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                削除
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-user-layout>
