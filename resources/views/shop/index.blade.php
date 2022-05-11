<x-shop-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="border-b border-black font-semibold text-2xl my-2">Featured Items</h1>
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
    </div>
</x-shop-layout>
