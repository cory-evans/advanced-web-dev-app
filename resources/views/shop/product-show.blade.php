<x-shop-layout>
    <x-slot name="header">
        {{ $product->title }}
    </x-slot>

    <div class="my-4 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="flex space-x-2 mb-2">
            <a href="{{ route('shop') }}"
                class="hover:underline"
            >All Products</a>
            <span>&gt;</span>
            <a href="{{ route('shop.category', ['category' => $product->category]) }}"
                class="hover:underline"
            >
                {{ $product->category->name }}
            </a>
        </div>
        <div class="grid grid-cols-4 gap-2 ">
            <div class="col-span-3 flex flex-col bg-white rounded shadow p-2">
                <div class="flex justify-around">
                    <img src="{{ Storage::url($product->media->path) }}" alt="{{ $product->title }}" loading="lazy"
                        class="object-cover h-[400px]"
                    />
                </div>
                <span class="text-center">{{ $product->title }}</span>
            </div>

            <div class="bg-white rounded shadow p-2 flex flex-col">
                <span class="font-bold w-full text-center text-xl my-4">${{ $product->displayPrice() }}</span>
                <x-button
                    :variant="'primary'"
                    class="text-center"
                    x-data="{}"
                    {{-- add(id, name, price_cents, image) --}}
                    @click="$store.shopping_cart.add({{ $product->id }}, `{{ $product->title }}`, {{ $product->price_cents }}, `{{ Storage::url($product->media->path) }}`)"
                >
                    Add To Cart
                </x-button>
            </div>
        </div>

        <div class="mt-2 p-2 bg-white rounded shadow">
            <pre class="font-sans whitespace-normal">{{ $product->description }}</pre>
        </div>
    </div>
</x-shop-layout>
