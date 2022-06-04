<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-4">
        <a href="{{ route('admin.products.create') }}">
            <x-button :variant="'primary'">
                Add New Product
            </x-button>
        </a>

        {{ $products->links() }}
        
        <table>
            <thead>
                <th class="text-right">ID</th>
                <th class="text-left">TITLE</th>
                <th class="text-right">PRICE</th>
            </thead>

            <tbody>
            @foreach ($products->items() as $product)
            <tr class="{{ $loop->even ? 'bg-gray-100' : '' }} cursor-pointer hover:bg-blue-500 hover:text-white py-1"
                role="link"
                data-href="{{ route('admin.products.edit', ['product' => $product]) }}"
                onclick="window.open(`{{ route('admin.products.edit', ['product' => $product]) }}`, '_self')"
            >
                <td class="text-right px-1">{{ $product->id }}</td>
                <td class="text-clip overflow-hidden max-w-0 w-[100%] whitespace-nowrap">{{ $product->title }}</td>
                <td class="text-right px-1">${{ $product->displayPrice() }}</td>
                <td>
                    <x-icons.chevron-right class="h-[1em]"/>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</x-admin-layout>
