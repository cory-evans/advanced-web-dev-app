@php
function subnavClass($isActive) {
    $activeClasses = '';
    if ($isActive) {
        $activeClasses = 'text-blue-500';
    }
    return 'block px-3 py-1 flex justify-between items-center capitalize tracking-wide bg-white hover:text-blue-500 transition-colors ' . $activeClasses;
}
@endphp
<x-app-layout>
    <x-slot name="header">
        <header class="bg-white shadow">
            <div class="flex items-center justify-between max-w-7xl mx-auto py-6 sm:px-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{__('Admin Panel')}}
                </h2>
            </div>
        </header>
    </x-slot>

    <div class="flex-1 flex p-4 gap-4">
        <nav class="bg-white flex-shrink-0 overflow-hidden shadow-sm rounded sm:rounded-lg">
            <ul class="flex flex-col min-w-[200px] divide-y divide-gray-400 py-1">
                <li class="flex flex-col">
                    <a class="{{ subnavClass(request()->routeIs('admin.products.index')) }}" href="{{ route('admin.products.index') }}">
                        <span>Products</span>
                        <x-icons.chevron-right class="h-[1em]" />
                    </a>
                    <ul class="ml-6">
                        <li>
                            <a class="{{ subnavClass(request()->routeIs('admin.products.index')) }}" href="{{ route('admin.products.index') }}">
                                <span>List All</span>
                                <x-icons.chevron-right class="h-[1em]" />
                            </a>
                        </li>
                        <li>
                            <a class="{{ subnavClass(request()->routeIs('admin.products.create')) }}" href="{{ route('admin.products.create') }}">
                                <span>Create</span>
                                <x-icons.chevron-right class="h-[1em]" />
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col">
                    <a class="{{ subnavClass(request()->routeIs('admin.media.index')) }}" href="{{ route('admin.media.index') }}">
                        <span>Media</span>
                        <x-icons.chevron-right class="h-[1em]" />
                    </a>
                    <ul class="ml-6">
                        <li>
                            <a class="{{ subnavClass(request()->routeIs('admin.media.index')) }}" href="{{ route('admin.media.index') }}">
                                <span>List All</span>
                                <x-icons.chevron-right class="h-[1em]" />
                            </a>
                        </li>
                        <li>
                            <a class="{{ subnavClass(request()->routeIs('admin.media.create')) }}" href="{{ route('admin.media.create') }}">
                                <span>Create</span>
                                <x-icons.chevron-right class="h-[1em]" />
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="{{ subnavClass(request()->routeIs('admin.users.index')) }}" href="{{ route('admin.users.index') }}">
                        <span>Users</span>
                        <x-icons.chevron-right class="h-[1em]" />
                    </a>
                </li>
                <li>
                    <a class="{{ subnavClass(request()->routeIs('admin.orders.index')) }}" href="{{ route('admin.orders.index') }}">
                        <span>Orders</span>
                        <x-icons.chevron-right class="h-[1em]" />
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-1">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>
