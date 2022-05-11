<x-forum-layout>
    <x-slot name="header">
        {{ __('Post') }}
    </x-slot>
    <div class="max-w-3xl mx-auto my-4 flex flex-col gap-4">
        <div class="bg-white rounded shadow p-4">
            <div class="flex flex-col">
                <h2 class="text-sm text-gray-500">Post by <a href="{{ route('account.show', ['user' => $post->user]) }}" class="underline">{{ $post->user->name }}</a></h2>
                <h1 class="text-lg">{{ $post->title }}</h1>

                <hr class="my-1">

                <div>
                    {{ $post->body }}
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow p-4">
            <form action="{{ route('forum.post.comment.store', ['forumPost' => $post->id]) }}" method="POST">
                @csrf

                <div class="flex space-x-2 w-full">
                    <input class="flex-1 px-2 py-1 placeholder-shown:italic shadow-none border-b border-b-black focus:outline-none"
                        placeholder="Write a comment..."
                        name="body"
                    />

                    <x-button :variant="'primary'" type="submit">
                        Send
                    </x-button>
                </div>
            </form>
        </div>
        <div class="bg-white rounded shadow p-4">
            <ul class="flex flex-col gap-4 diivde-y divide-gray-500">
                @forelse ($post->forumPostComment as $comment)
                <li>
                    <h2 class="text-sm text-gray-500">Comment by <a href="{{ route('account.show', ['user' => $comment->user]) }}" class="underline">{{ $comment->user->name }}</a></h2>
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
</x-forum-layout>
