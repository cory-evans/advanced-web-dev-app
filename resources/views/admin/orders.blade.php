<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-2">

        {{ $orders->links() }}

        <table class="w-full">
            <thead>
                <th class="text-right">ID</th>
                <th class="text-left">STATUS</th>
                <th class="text-left">EMAIL</th>
                <th>TOTAL PRICE</th>
            </thead>

            <tbody>
            @foreach ($orders->items() as $order)
            <tr class="{{ $loop->even ? 'bg-gray-100' : '' }} cursor-pointer hover:bg-blue-500 hover:text-white py-1"
                role="link"
                data-href="{{ route('admin.orders.show', ['order' => $order]) }}"
                onclick="window.open(`{{ route('admin.orders.show', ['order' => $order]) }}`, '_self')"
            >
                <td class="text-right px-1">{{ $order->id }}</td>
                <td class="px-1">{{ $order->status }}</td>
                <td class="px-1">{{ $order->email }}</td>
                <td class="px-1 text-center">${{ $order->total_price / 100 }}</td>

                <td>
                    <x-icons.chevron-right class="h-[1em]"/>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
</x-admin-layout>
