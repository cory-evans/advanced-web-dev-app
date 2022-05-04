require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

window.Alpine = Alpine;

Alpine.plugin(persist);
Alpine.store('shopping_cart', {
    items: Alpine.$persist([]).as('shopping_cart_items'),
    add(id, name, price_cents) {
        var qty = 1
        const found = this.items.filter(i => i.id == id)
        if (found.length > 0) {
            // item is already the the cart
            qty = found[0].qty + 1
        }
        this.remove(id)
        this.items.push({
            id,
            name,
            price_cents,
            qty: qty
        })
    },
    remove(id) {
        this.items = this.items.filter((item) => item.id != id)
    },
    clearCart() {
        this.items = [];
    }
})

Alpine.data('shopping_cart_dropdown', function () {
    return {
        expanded: true,
    }
})

Alpine.start();
