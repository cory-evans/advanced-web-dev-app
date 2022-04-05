<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum Posts') }}
        </h2>
    </x-slot>
    <ul class="max-w-3xl mx-auto my-4 flex flex-col gap-3">
        <x-forum.page-control :page=$page />
        @foreach ($posts as $post)
        <li class="bg-white rounded shadow p-4">
            <div class="hover:cursor-pointer"
            onclick="window.location = `{{ route('forum.post.show', ['forumPost' => $post->id]) }}`"
            >
                <div class="flex flex-col">
                    <h2 class="text-sm text-gray-500">Post by <a href="{{ route('index') }}" class="underline">{{ $post->user->name }}</a></h2>
                    <h1 class="text-lg">{{ $post->title }}</h1>

                    <hr class="my-1">

                    <div>
                        {{ $post->body }}
                    </div>
                </div>
            </div>
        </li>
        @endforeach
        <x-forum.page-control :page=$page />
    </ul>
</x-app-layout>
