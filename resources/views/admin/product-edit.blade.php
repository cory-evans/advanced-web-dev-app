<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <form action="{{ route('admin.products.update', ['product' => $product]) }}" method="POST">
            @csrf
            @method('put')
            <div class="flex flex-col">
                <label for="product-title">Title</label>
                <input type="text" name="title" id="product-title" value="{{ $product->title }}" autofocus />
                @error('title')

                @enderror
            </div>
            <div class="flex flex-col">
                <label for="product-description">Description</label>
                <textarea type="text" name="description" id="product-description">{{ $product->description }}</textarea>
            </div>
            <div class="flex flex-col" x-data="{price: {{ $product->price_cents / 100 }}}">
                <label for="product-price">Price</label>
                <input type="hidden" name="price_cents" :value="(parseFloat(price) * 100).toFixed(0)" />
                <input type="number" step="0.01" id="product-price" x-model="price" />
            </div>
            <div class="flex items-center space-x-1 select-none">
                <input type="checkbox" name="is_featured" id="product-is_featured" {{ $product->is_featured ? 'checked' : '' }} />
                <label for="product-is_featured">Featured</label>
            </div>

            <div class="flex flex-col relative" x-data="{ imageName: '{{ $product->media->name }}', imageId: '{{ $product->media->id }}', showResults: false, results: []}">
                <label for="image-name">Product Image</label>
                <input
                    type="text"
                    id="image-name"
                    class="placeholder-shown:italic"
                    placeholder="Search for a image"
                    x-model="imageName"
                    @input.debounce="(event) => { if (!event.target.value) { imageId=''; showResults=false; return; }; axios.get(`{{ route('admin.media.search') }}?query=${event.target.value}`).then(resp => {results = resp.data['media']; showResults = true}) }"
                />

                <input type="hidden" name="image_id" x-model="imageId">

                <ul x-show="showResults" style="display: none;" class="bg-white border border-gray-400 absolute left-0 right-0 top-full overflow-y-auto max-h-16">
                    <template x-for="img in results" :key="img.id">
                        <li @click="imageName=img.name; imageId=img.id; showResults=false;"
                            class="cursor-pointer hover:bg-gray-100"
                        >
                            <span x-text="img.name" class="px-2 py-1"></span>
                        </li>
                    </template>
                </ul>
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
