<x-shop-layout>
    <x-slot name="header">
        Checkout - Finished
    </x-slot>

    <div class="bg-white rounded-sm my-4 max-w-5xl mx-auto p-2 sm:p-6 lg:p-8" x-data="{}" x-init="$store.shopping_cart.clearCart()">
        <h1 class="border-b border-black font-semibold text-2xl mb-2 mt-6">Order Details</h1>
        <div class="grid grid-cols-2">
            <span>Order Number</span>
            <span>{{ $shopOrder->id }}</span>

            <span>Contact Email</span>
            <span>{{ $shopOrder->email }}</span>
        </div>

        <h1 class="border-b border-black font-semibold text-2xl mb-2 mt-6">Items</h1>
        <ul style="min-width: 400px;">
            @foreach($shopOrder->line_items as $item)
                <li class="flex items-center space-x-4 p-1">
                    <img src="{{Storage::url($item->product->media->path)}}" alt="{{$item->product->name}}" class="h-24 w-24 rounded-sm" />
                    <div class="flex-1 flex flex-col">
                        <span class="flex-1 text-sm">{{$item->product->name}}</span>
                        <div class="text-sm text-gray-600">
                            $<span>{{ $item->product->displayPrice() }}</span>
                            <span>x</span>
                            <span>{{ $item->qty }}</span>
                        </div>
                    </div>
                    <span>$<span x-text="(({{$item->product->price_cents}} * {{$item->qty}}) / 100).toFixed(2)"></span></span>
                </li>
            @endforeach
        </ul>
    </div>
</x-shop-layout>
