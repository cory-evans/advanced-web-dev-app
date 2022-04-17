<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <h1 class="text-xl border-b border-black my-2">Create a new Product</h1>
        @include('partials.errors')
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="flex flex-col">
                <label for="product-title">Title (name)</label>
                <input type="text" name="title" id="product-title" autofocus value="{{ old('title') }}" />
            </div>
            <div class="flex flex-col">
                <label for="product-description">Description</label>
                <textarea type="text" name="description" id="product-description">{{ old('description') }}</textarea>
            </div>
            <div class="flex flex-col" x-data="{price: {{ json_encode(old('price_cents', 0)) }}}">
                <label for="product-price">Price</label>
                <input type="hidden" name="price_cents" :value="(parseFloat(price) * 100).toFixed(0)" />
                <input type="number" step="0.01" id="product-price" x-model="price" />
            </div>
            <div class="flex items-center space-x-1 select-none">
                <input type="checkbox" name="is_featured" id="product-is_featured" {{ old('is_featured') ? 'checked="checked"' : '' }} />
                <label for="product-is_featured">Featured</label>
            </div>

            <div class="flex flex-col relative" x-data="{ imageName: '{{ old('image_name') }}', imageId: '{{ old('image_id') }}', showResults: false, results: []}">
                <label for="image-name">Product Image</label>
                <input
                    type="text"
                    id="image-name"
                    name="image-name"
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
                <div></div>
                <x-button.primary type="submit">
                    Create
                </x-button.primary>
            </div>
        </form>
    </div>
</x-admin-layout>
