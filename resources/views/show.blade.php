<link rel="stylesheet" href="{{ asset('css/show.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
<x-app-layout title="{{ $product->name }}">
    <main class="product-detail-page">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('products.index') }}">Products</a>
                <span>/</span>
                <a href="{{ route('categories.show', $product->category->id) }}">{{ $product->category->name }}</a>
                <span>/</span>
                <span>{{ $product->name }}</span>
            </nav>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="product-detail">
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="{{ asset('img/' . $product->image) }}" 
                             alt="{{ $product->name }}"
                             onerror="this.src='/img/Gemini_Generated_Image_6yxz7z6yxz7z6yxz.png'"
                             id="mainImage">
                    </div>
                </div>

                <div class="product-details">
                    <div class="product-category-badge">
                        <a href="{{ route('categories.show', $product->category->id) }}">
                            {{ $product->category->name }}
                        </a>
                    </div>

                    <h1 class="product-name">{{ $product->name }}</h1>

                    <div class="product-price-section">
                        <div class="current-price">₹{{ number_format($product->price) }}</div>
                        <div class="price-info">
                            <span class="tax-info">Inclusive of all taxes</span>
                        </div>
                    </div>

                    <div class="product-description">
                        <h3>Description</h3>
                        <p>{{ $product->description }}</p>
                    </div>

                    @php
                        $inCart = Auth::check() && Auth::user()->carts()->where('product_id', $product->id)->exists();
                        $cartItem = $inCart ? Auth::user()->carts()->where('product_id', $product->id)->first() : null;
                    @endphp

                    <div class="product-purchase">
                        @if($inCart)
                            <div class="cart-status">
                                <div class="in-cart-message">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span>{{ $cartItem->quantity }} item(s) in cart</span>
                                </div>

                                <div class="cart-actions-group">
                                    <a href="{{ route('cart') }}" class="btn btn-success btn-view-cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                        View Cart
                                    </a>

                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-checkout">
                                        Proceed to Checkout
                                    </a>
                                </div>

                                <form action="{{ route('cart.add') }}" method="POST" class="add-more-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="quantity-selector">
                                        <label>Add more:</label>
                                        <div class="quantity-control">
                                            <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                                            <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-add-more">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add More
                                    </button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-main-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div class="quantity-selector">
                                    <label>Quantity:</label>
                                    <div class="quantity-control">
                                        <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                                        <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                                    </div>
                                </div>

                                <div class="action-buttons">
                                    <button type="submit" class="btn btn-primary btn-add-to-cart-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>

                    <div class="product-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Free Shipping</span>
                        </div>
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                            </svg>
                            <span>7 Days Return</span>
                        </div>
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>Secure Payment</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Products --}}
            @if($relatedProducts->count() > 0)
                <div class="related-products">
                    <h2>Related Products</h2>
                    <div class="products-grid">
                        @foreach($relatedProducts as $relProduct)
                            <div class="product-card">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $relProduct->id) }}">
                                        <img src="{{ asset('img/' . $relProduct->image) }}" 
                                             alt="{{ $relProduct->name }}"
                                             onerror="this.src='/img/Gemini_Generated_Image_6yxz7z6yxz7z6yxz.png'">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="{{ route('products.show', $relProduct->id) }}">
                                            {{ $relProduct->name }}
                                        </a>
                                    </h3>
                                    <div class="product-price">₹{{ number_format($relProduct->price) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>