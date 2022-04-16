<x-admin-layout>
    <div class="bg-white shadow-sm rounded sm:rounded-lg p-4">
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="flex flex-col">
                <input type="file" name="image" id="image" accept="image/*">
                @error('image')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <x-button.primary>
                Upload
            </x-button.primary>
        </form>
    </div>
</x-admin-layout>
