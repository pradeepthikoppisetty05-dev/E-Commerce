<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<script src="{{ asset('js/cart.js') }}" defer></script>

<x-app-layout title="Shopping Cart">
    <main class="cart-page">
        <div class="container">
            <div class="page-header">
                <h1>Shopping Cart</h1>
                <nav class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span>Cart</span>
                </nav>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($cartItems->count() > 0)
                <div class="cart-container">
                    <div class="cart-items-section">
                        

                        <div class="cart-items">
                            @foreach($cartItems as $item)
                                <div class="cart-item">
                                    <div class="cart-item-image">
                                        <img src="{{ asset('img/' . $item->product->image) }}" 
                                             alt="{{ $item->product->name }}"
                                             onerror="this.src='/img/Gemini_Generated_Image_6yxz7z6yxz7z6yxz.png'" />
                                    </div>

                                    <div class="cart-item-details">
                                        <h3 class="cart-item-title">
                                            <a href="{{ route('products.show', $item->product->id) }}">
                                                {{ $item->product->name }}
                                            </a>
                                        </h3>
                                        <p class="cart-item-category">
                                            <span class="badge">{{ $item->product->category->name }}</span>
                                        </p>
                                        <p class="cart-item-description">
                                            {{ Str::limit($item->product->description, 80) }}
                                        </p>
                                    </div>

                                    <div class="cart-item-price">
                                        <span class="price">₹{{ number_format($item->product->price) }}</span>
                                    </div>

                                    <div class="cart-item-quantity">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="quantity-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="quantity-control">
                                                <button type="button" class="qty-btn qty-minus" data-action="decrease">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                </button>
                                                <input type="number" 
                                                       name="quantity" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1" 
                                                       max="99"
                                                       class="qty-input"
                                                       data-item-id="{{ $item->id }}"
                                                       data-price="{{ $item->product->price }}">
                                                <button type="button" class="qty-btn qty-plus" data-action="increase">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-update">Update</button>
                                        </form>
                                    </div>

                                    <div class="cart-item-subtotal">
                                        <span class="subtotal-label">Subtotal:</span>
                                        <span class="subtotal-amount" data-subtotal="{{ $item->product->price * $item->quantity }}">
                                            ₹{{ number_format($item->product->price * $item->quantity) }}
                                        </span>
                                    </div>

                                    <div class="cart-item-actions">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Remove this item from cart?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-remove" title="Remove item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="cart-summary-section">
                        <div class="cart-summary">
                            <h2>Order Summary</h2>
                            
                            <div class="summary-row">
                                <span>Subtotal ({{ $cartItems->count() }} items)</span>
                                <span class="summary-subtotal">₹{{ number_format($total) }}</span>
                            </div>

                            <div class="summary-row">
                                <span>Shipping</span>
                                <span class="text-success">FREE</span>
                            </div>

                            

                            <hr>

                            <div class="summary-row summary-total">
                                <span>Total</span>
                                <span class="summary-total-amount">₹{{ number_format($total)}}</span>
                            </div>

                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-checkout">
                                Proceed to Checkout
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>

                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-continue">
                                Continue Shopping
                            </a>

                            <div class="secure-checkout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span>Secure Checkout</span>
                            </div>
                        </div>

                        <div class="cart-benefits">
                            <h3>Benefits</h3>
                            <ul>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    Free shipping on all orders
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    7 days return policy
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    Secure payment options
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    24/7 customer support
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <h2>Your cart is empty</h2>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
