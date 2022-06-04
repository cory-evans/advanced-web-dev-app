<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-2">

        <h1 class="mt-4 border-b border-black text-2xl">Order Details</h1>
        <h1>Order Number: {{ $order->id }}</h1>
        <h1>Placed: {{ $order->created_at }}</h1>

        <h2>Customer Contact: {{ $order->email }}</h2>

        <h1 class="mt-4 border-b border-black text-2xl">Line Items</h1>
        <table class="w-full">
            <thead>
                <th>P. ID</th>
                <th class="text-left">PRODUCT NAME</th>
                <th>QTY</th>
                <th>PRICE</th>
            </thead>

            <tbody>
            @foreach ($order->line_items as $item)
            <tr class="{{ $loop->even ? 'bg-gray-100' : '' }} py-1">
                <td class="px-1 text-right">{{ $item->product->id }}</td>
                <td class="px-1">{{ $item->product->title }}</td>
                <td class="px-1 text-center">{{ $item->qty }}</td>
                <td class="px-1 text-center">{{ $item->price_cents / 100 }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex justify-end">
            <div class="flex space-x-2">
                <span>Total</span>
                <span>${{ $order->total_price / 100 }}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
