<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<x-app-layout>
    <h1>Checkout</h1>

    <p>Total: ₹{{ number_format($total) }}</p>

    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf
        <button type="submit">Place Order</button>
    </form>
</x-app-layout>
