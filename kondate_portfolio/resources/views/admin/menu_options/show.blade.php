<x-admin-layout>
    @if (session('success'))
        <div class="alert alert-success text-green-500">
            {{ session('success') }}
        </div>
    @endif
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">献立詳細</h1>
            </div>
        </div>
    </section>
</x-admin-layout>
