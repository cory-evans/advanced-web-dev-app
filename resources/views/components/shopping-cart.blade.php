<div x-data="shopping_cart_dropdown" class="relative">
    <button @click="expanded = !expanded">shopping cart</button>
    <div class="absolute top-full right-0" x-show="expanded" @click.outside="expanded = false">
        <div class="bg-white shadow rounded">
            <x-button :variant="'danger'" @click="$store.shopping_cart.clearCart()">
                Clear Cart
            </x-button>
            <ul>
                <template x-for="item in $store.shopping_cart.items">
                    <li class="flex items-center space-x-2">
                        <span x-text="item.name" class="flex-1 text-sm"></span>
                        <span x-text="item.price_cents / 100"></span>
                        <span x-text="item.qty"></span>
                        <button @click="$store.shopping_cart.remove(item.id)">Delete</button>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>
