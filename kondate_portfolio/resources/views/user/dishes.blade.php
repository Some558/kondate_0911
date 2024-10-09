@php
use App\Models\UserDishes;
@endphp

<x-user-layout>
    <div class="container mx-auto px-2 py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800">献立候補</h1>
            <a href="{{ route('user.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1 px-3 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                献立選択画面に戻る
            </a>
        </div>

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

        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">メインメニュー</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
                @foreach ($menu_options->where('dish_type', 'main') as $menu_option)
                    @include('user.components.dish-card', ['menu_option' => $menu_option])
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">サブメニュー</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
                @foreach ($menu_options->where('dish_type', 'sub') as $menu_option)
                    @include('user.components.dish-card', ['menu_option' => $menu_option])
                @endforeach
            </div>
        </div>
    </div>
</x-user-layout>
