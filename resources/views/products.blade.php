<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
@include('components.layouts.header')
<main>
        <x-search-form />

        @if(session('success'))
            <div class="container">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        {{-- Display Products by Category --}}
        @foreach($categories as $category)
            @if($category->products->count() > 0)
                <section class="categories" id="categories">
                    <div class="container">
                        <div class="heading">
                            <h2>{{ $category->name }}</h2>
                            <a href="{{ route('categories.show', $category->id) }}" class="view-all-link">
                                View All 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                        <div class="cards">
                            <div class="card-items-list">
                                @foreach($category->products->take(8) as $product)
                                    <div class="card-item">
                                        <a href="{{ route('products.show', $product->id) }}" class="card-link">
                                            <img src="{{ asset('img/' . $product->image) }}" 
                                                 alt="{{ $product->name }}"
                                                 class="blog-item-img rounded-t" 
                                                 onerror="this.src='/img/Gemini_Generated_Image_6yxz7z6yxz7z6yxz.png'" />
                                        </a>
                                        <div class="p-medium">
                                            <div class="flex-item-center justify-between">
                                                <small class="m-0 text-muted">{{ $category->name }}</small>
                                                <button class="btn-heart" data-product-id="{{ $product->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" style="width: 20px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <h2 class="blog-item-title">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h2>
                                            <p class="blog-item-description">{{ Str::limit($product->description, 60) }}</p>
                                            <div class="product-footer">
                                                <p class="product-price">
                                                    <span class="blog-item-badge price-badge">₹{{ number_format($product->price) }}</span>
                                                </p>

                                                @php
                                                    $inCart = Auth::check() && Auth::user()->carts()->where('product_id', $product->id)->exists();
                                                @endphp

                                                @if($inCart)
                                                    <a href="{{ route('cart') }}" class="btn btn-success btn-sm btn-in-cart">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg>
                                                        In Cart
                                                    </a>
                                                @else
                                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <circle cx="9" cy="21" r="1"></circle>
                                                                <circle cx="20" cy="21" r="1"></circle>
                                                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                            </svg>
                                                            Add to Cart
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach

        {{-- Fallback if no products exist --}}
        @if($categories->sum(fn($cat) => $cat->products->count()) == 0)
            <section class="categories">
                <div class="container">
                    <div class="heading">
                        <h2>Products</h2>
                    </div>
                    <div class="empty-state">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <p>No products available at the moment. Please check back later!</p>
                    </div>
                </div>
            </section>
        @endif
        </main>