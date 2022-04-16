<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <form action="{{ route('admin.products.update', ['product' => $product]) }}" method="POST">
            @csrf
            @method('put')
            <div class="flex flex-col">
                <label for="product-title">Title</label>
                <input type="text" name="title" id="product-title" value="{{ $product->title }}" autofocus />
            </div>
            <div class="flex flex-col">
                <label for="product-description">Description</label>
                <textarea type="text" name="description" id="product-description">{{ $product->description }}</textarea>
            </div>
            <div class="flex flex-col">
                <label for="product-price">Price</label>
                <input type="text" name="price_cents" id="product-price" value="{{ $product->price_cents }}" />
            </div>
            <div class="flex items-center space-x-1 select-none">
                <input type="checkbox" name="is_featured" id="product-is_featured" value="{{ $product->is_featured }}" />
                <label for="product-is_featured">Featured</label>
            </div>

            <div class="flex justify-between mt-8">
                <script>
                    function deleteOnClick() {
                        if (confirm('Are you sure you want to delete this product?')) {
                            axios.delete(`{{ route('admin.products.destroy', ['product' => $product]) }}`)
                                .then(() => {
                                    window.location = `{{ route('admin.products.index') }}`
                                })
                        }
                    }
                </script>
                <x-button.danger type="button" onclick="deleteOnClick();">
                    Delete Product
                </x-button.danger>
                <x-button.primary type="submit">
                    Update
                </x-button.primary>
            </div>
        </form>
    </div>
</x-admin-layout>
