<x-app-layout>
    <x-slot name="header">
        <button onclick="window.history.back()">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center space-x-3">
                <x-icons.back-arrow class="h-[1em]"></x-icons.back-arrow>
                <span>
                    {{ __('Post') }}
                </span>
            </h2>
        </button>
    </x-slot>
    <div class="max-w-3xl mx-auto my-4 flex flex-col gap-4">
        <div class="bg-white rounded shadow p-4">
            <div class="flex flex-col">
                <h2 class="text-sm text-gray-500">Post by <a href="{{ route('index') }}" class="underline">{{ $post->user->name }}</a></h2>
                <h1 class="text-lg">{{ $post->title }}</h1>

                <hr class="my-1">

                <div>
                    {{ $post->body }}
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4">
            <ul class="flex flex-col gap-4 diivde-y divide-gray-500">
                @forelse ($post->forumPostComment as $comment)
                <li>
                    <h2 class="text-sm text-gray-500">Comment by <a href="{{ route('index') }}" class="underline">{{ $comment->user->name }}</a></h2>
                    <div>
                        {{ $comment->body }}
                    </div>
                </li>
                @empty
                <li>
                    <h2 class="text-center text-gray-500">
                        No comments to display
                    </h2>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
