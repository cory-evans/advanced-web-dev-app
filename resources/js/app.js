require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

window.Alpine = Alpine;

Alpine.plugin(persist);
Alpine.store('shopping_cart', {
    items: Alpine.$persist({}).as('shopping_cart_items'),
    calcTotalPretty() {
        var amount = Object.values(this.items).reduce((prv, nxt) => prv + (nxt.price_cents * nxt.qty || 0), 0)

        amount = amount / 100  // convert to dollars

        return amount.toFixed(2)
    },
    add(id, name, price_cents, image) {
        if (this.items[id]) {
            // already exists
            this.items[id].qty++
            return
        }

        this.items[id] = {
            name,
            price_cents,
            image,
            qty: 1
        }
    },
    increment(id) {
        this.items[id].qty++
    },
    decrement(id) {
        this.items[id].qty--
    },
    remove(id) {
        delete this.items[id]
    },
    clearCart() {
        this.items = {};
    }
})

Alpine.data('shopping_cart_dropdown', function () {
    return {
        expanded: false,
    }
})

Alpine.start();
