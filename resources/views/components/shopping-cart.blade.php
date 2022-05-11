<div x-data="shopping_cart_dropdown" class="relative">
    <button @click="expanded = !expanded" class="flex items-center">
        <x-icons.shopping-cart class="h-8 w-8 stroke-gray-600" />
        <x-icons.chevron-down ::class="'h-6 w-6 stroke-gray-600 transition-transform ' + (expanded ? '' : 'rotate-180') " />
    </button>
    <div class="absolute top-full right-0" style="display: none;" x-show="expanded" @click.outside="expanded = false">
        <div class="bg-white shadow-lg rounded p-2 border">
            <ul style="min-width: 400px;">
                <template x-for="[id, item] in Object.entries($store.shopping_cart.items)">
                    <li class="flex items-center space-x-2 p-1">
                        <img x-bind:src="item.image" x-bind:alt="item.name" class="h-12 w-12 rounded-sm" />
                        <span x-text="item.name" class="flex-1 text-sm"></span>
                        <span>$<span x-text="(item.price_cents * item.qty) / 100"></span></span>
                        <div class="flex flex-col items-center select-none">
                            <button
                                @click="$store.shopping_cart.increment(id)"
                            >
                                <x-icons.plus class="h-3 w-3 stroke-gray-500" />
                            </button>
                            <span x-text="item.qty"></span>
                            <button x-bind:disabled="item.qty == 1" class="stroke-gray-500 disabled:stroke-gray-300"
                                @click="$store.shopping_cart.decrement(id)"
                            >
                                <x-icons.minus class="h-3 w-3 stroke-inherit" />
                            </button>
                        </div>
                        <button @click="$store.shopping_cart.remove(id)">
                            <x-icons.trash class="w-4 h-4 stroke-gray-600 hover:stroke-red-600 transition-colors" />
                        </button>
                    </li>
                </template>
                <li x-show="Object.keys($store.shopping_cart.items).length === 0" class="grid place-items-center">
                    <span class="text-gray-500">No items in shopping cart.</span>
                </li>
            </ul>
            <div class="mt-4 flex justify-between items-center">
                <x-button :variant="'danger'" @click="$store.shopping_cart.clearCart()">
                    Clear Cart
                </x-button>

                <a href="{{ route('checkout.view') }}"
                    class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out duration-150  text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300"
                >CHECKOUT</a>
            </div>
        </div>
    </div>
</div>
