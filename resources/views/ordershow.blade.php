<x-app-layout title="Order Details">

    <h1>Order #{{ $order->id }}</h1>

    <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
    <p>Total: ₹{{ number_format($order->total_amount) }}</p>

    <hr>

    <h3>Items</h3>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>₹{{ number_format($item->price) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₹{{ number_format($item->price * $item->quantity) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <a href="{{ route('orders.index') }}">← Back to orders</a>

</x-app-layout>
