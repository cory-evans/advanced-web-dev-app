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
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{__('Admin Panel')}}
		</h2>
	</x-slot>

    <div class="flex-1 flex p-4 gap-4">
        <nav class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg">
            <ul class="flex flex-col min-w-[200px] divide-y divide-gray-400 py-1">
                <li>
                    <a class="{{ subnavClass(request()->routeIs('admin.products.index')) }}" href="{{ route('admin.products.index') }}">
                        <span>Products</span>
                        <span>&rsaquo;</span>
                    </a>
                </li>
                <li>
                    <a class="{{ subnavClass(request()->routeIs('admin.forum.index')) }}" href="{{ route('admin.forum.index') }}">
                        <span>Forum</span>
                        <span>&rsaquo;</span>
                    </a>
                </li>
                <li>
                    <a class="{{ subnavClass(request()->routeIs('admin.users.index')) }}" href="{{ route('admin.users.index') }}">
                        <span>Users</span>
                        <span>&rsaquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-1">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>
