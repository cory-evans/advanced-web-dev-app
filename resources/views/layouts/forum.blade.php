<x-app-layout>
    <x-slot name="header">
        <header class="bg-white shadow">
            <div class="flex items-center justify-between max-w-7xl mx-auto">
                <div class="py-6 sm:px-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </h2>
                </div>

                <a href="{{ route('forum.post.create') }}">
                    <x-button class="flex items-center space-x-2">
                        {{ __('New Post') }}
                        <x-icons.plus class="w-4 h-4" />
                    </x-button>
                </a>
            </div>
        </header>
    </x-slot>

    {{ $slot }}
</x-app-layout>
