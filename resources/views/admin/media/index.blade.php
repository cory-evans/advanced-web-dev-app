<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <a href="{{ route('admin.media.create') }}">
            <x-button :variant="'primary'">Upload A New Image</x-button>
        </a>

        <ul class="mt-4 grid grid-cols-6 gap-2">
            @foreach ($media as $img)
            <li class="flex flex-col justify-between items-center bg-white shadow p-1 rounded-sm">
                <img src="{{ Storage::url($img->path); }}" alt="{{ $img->name }}"
                    class="object-contain w-full aspect-square"
                >
                <span>{{ $img->name }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
