<x-forum-layout>
    <x-slot name="header">
        {{ __('Create New Post') }}
    </x-slot>
    <div class="max-w-3xl mx-auto my-4 flex flex-col gap-3">
        <form action="{{ route('forum.post.store') }}">
            @csrf
            <h1>Hello world</h1>
        </form>
    </div>
</x-forum-layout>
