<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum Posts') }}
        </h2>
    </x-slot>
    <ul>
        @foreach ($posts as $post)
        <li>
            {{ $post->title }}
            <br>
            {{ $post->body }}
            <br>
            {{ $post->user->name }}
        </li>
        @endforeach
    </ul>
</x-app-layout>
