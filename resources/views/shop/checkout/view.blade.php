<x-shop-layout>
    <x-slot name="header">
        Checkout
    </x-slot>

    <div class="bg-white rounded-sm my-4 max-w-5xl mx-auto p-2 sm:p-6 lg:p-8" x-data="{}">
        <form action="{{ route('checkout.store') }}" method="POST">
            <input type="hidden" name="items" x-model="JSON.stringify($store.shopping_cart.items)" />

            <h1 class="border-b border-black font-semibold text-2xl mb-2 mt-6">Items</h1>
            <ul style="min-width: 400px;">
                <template x-for="[id, item] in Object.entries($store.shopping_cart.items)">
                    <li class="flex items-center space-x-4 p-1">
                        <img x-bind:src="item.image" x-bind:alt="item.name" class="h-24 w-24 rounded-sm" />
                        <div class="flex-1 flex flex-col">
                            <span x-text="item.name" class="flex-1 text-sm"></span>
                            <div class="text-sm text-gray-600">
                                $<span x-text="(item.price_cents / 100).toFixed(2)"></span>
                                <span>x</span>
                                <span x-text="item.qty"></span>
                            </div>
                        </div>
                        <span>$<span x-text="((item.price_cents * item.qty) / 100).toFixed(2)"></span></span>
                        <div class="flex flex-col items-center select-none">
                            <button
                                @click="$store.shopping_cart.increment(id)"
                                type="button"
                            >
                                <x-icons.plus class="h-3 w-3 stroke-gray-500" />
                            </button>
                            <span x-text="item.qty"></span>
                            <button x-bind:disabled="item.qty == 1" class="stroke-gray-500 disabled:stroke-gray-300"
                                @click="$store.shopping_cart.decrement(id)"
                                type="button"
                            >
                                <x-icons.minus class="h-3 w-3 stroke-inherit" />
                            </button>
                        </div>
                        <button @click="$store.shopping_cart.remove(id)" type="button">
                            <x-icons.trash class="w-4 h-4 stroke-gray-600 hover:stroke-red-600 transition-colors" />
                        </button>
                    </li>
                </template>
                <li x-show="Object.keys($store.shopping_cart.items).length === 0" class="grid place-items-center">
                    <span class="text-gray-500">No items in shopping cart.</span>
                </li>
            </ul>
            <div class="mt-4">
                <div class="flex justify-end space-x-2 font-semibold">
                    <h2>Total: </h2>
                    <span>$<span x-text="$store.shopping_cart.calcTotalPretty()"></span></span>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-col">
                    <x-label for="email">Email</x-label>
                    @auth
                    <x-input type="email" name="email" id="email" required value="{{ Auth::user()->email }}" />
                    @else
                    <x-input type="email" name="email" id="email" required />
                    @endauth
                </div>
            </div>
            <div class="mt-8 flex items-center justify-end">
                <x-button :variant="'primary'" type="submit">
                    Place Order
                </x-button>
            </div>
            @csrf
        </form>
    </div>
</x-shop-layout>
