<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="flex flex-col">
                <label for="product-title">Title</label>
                <input type="text" name="title" id="product-title" autofocus />
            </div>
            <div class="flex flex-col">
                <label for="product-description">Description</label>
                <textarea type="text" name="description" id="product-description"></textarea>
            </div>
            <div class="flex flex-col" x-data="{price: null}">
                <label for="product-price">Price</label>
                <input type="hidden" name="price_cents" :value="(parseFloat(price) * 100).toFixed(0)" />
                <input type="number" id="product-price" x-model="price" />
            </div>
            <div class="flex items-center space-x-1 select-none">
                <input type="checkbox" name="is_featured" id="product-is_featured" />
                <label for="product-is_featured">Featured</label>
            </div>

            <div class="flex justify-between mt-8">
                <div></div>
                <x-button.primary type="submit">
                    Create
                </x-button.primary>
            </div>
        </form>
    </div>
</x-admin-layout>
