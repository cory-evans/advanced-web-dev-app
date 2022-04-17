<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <a href="{{ route('admin.products.create') }}">
            <x-button.primary>
                Add New Product
            </x-button.primary>
        </a>
        <ul class="mt-4">
            <li class="flex items-center gap-2 select-none">
                <span class="w-8 text-right">ID</span>
                <span>TITLE</span>
                <div class="flex-1"></div>
                <span>PRICE</span>
                <span class="text-transparent flex flex-nowrap items-center">EDIT<x-icons.chevron-right class="h-[1em]" /></span>
            </li>
            @foreach ($products as $product)
            <li>
                <a class="flex items-center gap-2 hover:cursor-pointer hover:bg-gray-200 transition-colors" href="{{ route('admin.products.edit', ['product' => $product]) }}">
                    <span class="w-8 text-right">{{ $product->id }}</span>
                    <span class="overflow-x-hidden whitespace-nowrap">{{ $product->title }}</span>
                    <div class="flex-1"></div>
                    <span>{{ $product->displayPrice() }}</span>
                    <span class="text-blue-500 flex flex-nowrap items-center">EDIT<x-icons.chevron-right class="h-[1em]" /></span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
