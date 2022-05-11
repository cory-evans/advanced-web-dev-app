<x-forum-layout>
    <x-slot name="header">
        {{ __('Create New Post') }}
    </x-slot>
    <div class="max-w-3xl p-4 bg-white shadow rounded mx-auto my-4 flex flex-col gap-3 sm:min-w-[400px]">
        <form action="{{ route('forum.post.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus maxlength="255" />
            </div>
            <div>
                <x-label for="body" :value="__('Body')" />

                <x-input-textarea id="body" class="block mt-1 w-full" type="text" name="body" :value="old('body')" required />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button type="submit">
                    Create
                </x-button>
            </div>
        </form>
    </div>
</x-forum-layout>
