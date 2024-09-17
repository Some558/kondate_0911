<x-admin-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">{{$menu_option->dish_name}}</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    {{ $menu_option->dish_type}}
                </p>
            </div>
        </div>
    </section>
</x-admin-layout>
