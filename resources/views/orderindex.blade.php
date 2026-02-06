<x-app-layout title="My Orders">

    <h1>My Orders</h1>

    @if($orders->count())
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>₹{{ number_format($order->total_amount) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have no orders yet.</p>
    @endif

</x-app-layout>
