<x-admin-layout>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('selectImageControl', () => ({
                imageId: 0,
                imageName: '',
                searchResults: [{id: 0, name:"this is fucked", path:"WTF"}],
                showResults: false,
                search: async (event) => {
                    if (!event.target.value) {
                        this.searchResults = []
                        this.showResults = false
                        return
                    }
                    this.searchResults = await axios.get(`{{ route('admin.media.search') }}` + `?query=${event.target.value}`)
                        .then((resp) => {
                            return resp.data['media'];
                        })
                    this.showResults = true;
                },

                resultOnClick(r) {
                    this.imageId = r.id
                    this.imageName = r.name
                    this.showResults = false
                }
            }))
        })
    </script>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <h1 class="text-xl border-b border-black my-2">Create a new Product</h1>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="flex flex-col">
                <label for="product-title">Title (name)</label>
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

            <div class="flex flex-col relative" x-data="{ imageName: '', imageId: '', showResults: false, results: []}">
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
                <div></div>
                <x-button.primary type="submit">
                    Create
                </x-button.primary>
            </div>
        </form>
    </div>
</x-admin-layout>
