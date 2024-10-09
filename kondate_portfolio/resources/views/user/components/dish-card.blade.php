@php
use App\Models\UserDishes;
@endphp

@php
$userDishes = UserDishes::where('user_id', auth()->id())
    ->where('menu_option_id', $menu_option->id)
    ->first();
@endphp

<div class="bg-white rounded shadow-sm overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md relative">
    @if ($userDishes)
        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-1 py-0.5 rounded-bl">追加済</div>
    @endif
    <div class="p-2">
        <h5 class="text-sm font-semibold text-gray-800 mb-1 truncate" title="{{ $menu_option->dish_name }}">{{ $menu_option->dish_name }}</h5>
        @if (!$userDishes)
            <form action="{{ route('user.dishes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="menu_option_id" value="{{ $menu_option->id }}">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-2 px-2 rounded transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    追加
                </button>
            </form>
        @endif
        @if ($userDishes)
            <form action="{{ route('user.dishes.destroy', $userDishes->user_menu_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-2 px-2 rounded transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    削除
                </button>
            </form>
        @endif
    </div>
</div>
