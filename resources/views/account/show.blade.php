<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($user->id == Auth::user()->id)
            {{ __('My Account') }}
            @else
            {{ __($user->name) }}
            @endif
        </h2>
    </x-slot>
</x-app-layout>
