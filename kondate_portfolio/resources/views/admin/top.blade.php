<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success text-green-500">
            {{ session('success') }}
        </div>
    @endif
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立候補を登録して下さい</h1>
                           </div>
                    <div class="p-2 w-full">
                        <button
                            onclick="location.href='{{ route('admin.menu_options.create') }}'"
                            class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">
                            献立候補_新規登録
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
