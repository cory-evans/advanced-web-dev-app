<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <div class="flex flex-col justify-between items-center">
            <img src="{{ Storage::url($media->path); }}" alt="{{ $media->name }}"
                class="object-contain w-full aspect-square"
                >
            <span>{{ $media->name }}</span>
        </div>

        <script>
            function deleteMediaOnClick() {
                axios.delete(`{{ route('admin.media.destroy', ['medium' => $media]) }}`)
                    .then(() => {
                        window.location = `{{ route('admin.media.index') }}`
                    })
            }
        </script>
        <x-modal :onclick="'deleteMediaOnClick();'" :variant="'danger'" :btnText="'Delete'">
            Are you sure you want to delete this image?
        </x-modal>
    </div>
</x-admin-layout>
