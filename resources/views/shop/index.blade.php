<x-shop-layout>
    <x-slot name="header">
        {{ __('Shop') }}
    </x-slot>

    <div class="max-w-7xl mb-8 mx-auto sm:px-6 lg:px-8">
        <h1 class="border-b border-black font-semibold text-2xl mb-2 mt-6">Featured Items</h1>
        <ul class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-4 2xl:grid-cols-6">
            @foreach ($featured as $item)
            <a class="flex flex-col" href="{{ route('shop.product.show', ['shopProduct' => $item->id]) }}">
                <li class="flex-1 flex flex-col items-center bg-white rounded shadow p-2">
                    <div class="flex justify-around">
                        <img src="{{ Storage::url($item->media->path) }}" alt="{{ $item->title }}" loading="lazy"
                        class="object-cover w-40 h-40"
                        />
                    </div>
                    <span class="text-center flex-1">{{ $item->title }}</span>
                    <span class="font-bold">${{ $item->displayPrice() }}</span>
                </li>
            </a>
            @endforeach
        </ul>

        <h1 class="border-b border-black font-semibold text-2xl mb-2 mt-6">Product Categories</h1>

        <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
            @foreach($categories as $cat)
            <a href="{{ route('shop.category', ['category' => $cat]) }}" class="p-2 cursor-pointer bg-white rounded shadow hover:bg-gray-50 shadow-md">{{ $cat->name }}</a>
            @endforeach
        </div>
    </div>
</x-shop-layout>
