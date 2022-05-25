<x-shop-layout>
    <x-slot name="header">
        {{ __($category->name) }}
    </x-slot>

    <div class="max-w-7xl mb-8 mt-4 mx-auto sm:px-6 lg:px-8">
        {{ $products->links() }}

        <ul>
            @foreach($products->items(); as $product)
            <a
                href="{{ route('shop.product.show', ['shopProduct' => $product]) }}"
                class="flex bg-white rounded-sm shadow-sm my-2 p-2 hover:shadow-blue-200"
                role="listitem"
            >
                <div class="flex justify-around">
                    <img src="{{ Storage::url($product->media->path) }}" alt="{{ $product->title }}" loading="lazy"
                        class="object-cover h-20 w-20 rounded m-2"
                    />
                </div>
                <h1 class="flex-1 my-2">{{ $product->title }}</h1>
                <div class="flex flex-col justify-between my-2">
                    <span class="font-bold text-center text-xl">${{ $product->displayPrice() }}</span>
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
            </a>
            @endforeach
        </ul>

        {{ $products->links() }}
    </div>
</x-shop-layout>
