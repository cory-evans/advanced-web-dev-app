<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <a href="{{ route('admin.media.create') }}">
            <x-button :variant="'primary'">Upload A New Image</x-button>
        </a>

        {{ $mediaPaginate->links() }}

        <ul class="mt-4 grid grid-cols-6 gap-2">
            @foreach ($mediaPaginate->items() as $media)
            <li class="flex flex-col justify-between items-center bg-white shadow p-1 rounded-sm cursor-pointer"
                role="link"
                data-href="{{ route('admin.media.show', ['medium' => $media]) }}"
                onclick="window.open(`{{ route('admin.media.show', ['medium' => $media]) }}`, '_self')"
            >
                <img src="{{ Storage::url($media->path); }}" alt="{{ $media->name }}"
                    class="object-contain w-full aspect-square"
                    >
                <span>{{ $media->name }}</span>
            </li>
            @endforeach
        </ul>

        {{ $mediaPaginate->links() }}
    </div>
</x-admin-layout>
