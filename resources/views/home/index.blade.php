<x-app-layout title="HomePage">
    <!-- Home Slider -->
    <section class="hero-slider">
        <!-- Carousel wrapper -->
        <div class="hero-slides">
            <!-- Item 1 -->
            <div class="hero-slide">
                <div class="container">
                    <div class="slide-content">
                        <h1 class="hero-slider-title">
                            Buy <strong>The Website</strong> <br>
                        </h1>
                        <div class="hero-slider-content">
                            <p>
                                Discover amazing products across multiple categories. 
                                From electronics to fashion, books to home appliances - 
                                we have everything you need in one place.
                            </p>

                           @auth
                                <a href="#categories" class="btn btn-hero-slider">Browse Products</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-hero-slider">Get Started</a>
                            @endauth
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="\img\image-18.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hero-slide">
                <div class="flex container">
                    <div class="slide-content">
                        <h2 class="hero-slider-title">
                            Shop with <br />
                            <strong>Confidence</strong>
                        </h2>
                        <div class="hero-slider-content">
                            <p>
                                Quality products, competitive prices, and excellent customer service. 
                                Join thousands of satisfied customers shopping with us today.
                            </p>

                            @auth
                                <a href="#categories" class="btn btn-hero-slider">Shop Now</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-hero-slider">Login to Shop</a>
                            @endauth
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="\img\image-18.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <button type="button" class="hero-slide-prev">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hero-slide-next">
                <svg style="width: 18px" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <!--/ Home Slider -->

    <main>
        <x-search-form />


        <section class="categories">
@foreach($categories as $category)
            @if($category->products->count() > 0)
                <section class="categories" id="categories">
                    <div class="container">
                        <div class="heading">
                            <h2>{{ $category->name }}</h2>
                        </div>
                        <div class="cards">
                            <div class="card-items-list">
                                @foreach($category->products as $product)
                                    <div class="card-item">
                                        <img src="{{ asset('img/' . $product->image) }}" 
                                             alt="{{ $product->name }}"
                                             class="blog-item-img rounded-t" 
                                             onerror="this.src='/img/Gemini_Generated_Image_6yxz7z6yxz7z6yxz.png'" />
                                        <div class="p-medium">
                                            <div class="flex-item-center justify-between">
                                                <small class="m-0 text-muted">{{ $category->name }}</small>
                                                @auth
                                                    <button class="btn-heart" data-product-id="{{ $product->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" style="width: 20px">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>
                                                    </button>
                                                @endauth
                                            </div>
                                            <h2 class="blog-item-title">{{ $product->name }}</h2>
                                            <p class="blog-item-description">{{ Str::limit($product->description, 60) }}</p>
                                            <div class="flex-item-center justify-between">
                                                <p class="m-0">
                                                    <span class="blog-item-badge">₹{{ number_format($product->price) }}</span>
                                                </p>
                                                @auth
                                                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                                                @else
                                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login to Buy</a>
                                                @endauth
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
                    <div class="cards">
                        <div class="card-items-list">
                            <div class="card-item">
                                <div class="p-medium text-center">
                                    <p>No products available at the moment. Please check back later!</p>
                                    @guest
                                        <a href="{{ route('register') }}" class="btn btn-primary">Register to Get Notified</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif


            
        </section>


        <section>
            <div class="about-wrapper">
                <div class="container">
                    <h2>About us</h2>
                    <section class="about-banner">
                        <div class="about-banner-content">
                            <h2>Build. Buy. Launch Faster.</h2>
                            <p>
                                We provide quality products across multiple categories including Electronics, 
                                Fashion, Books, and Home Appliances. Our mission is to make online shopping 
                                easy, secure, and enjoyable for everyone.
                            </p>
                        </div>
                    </section>

                </div>
            </div>


        </section>

    </main>



    <footer>
        <div class="container">

            <div class="footer-content">
                <footer class="site-footer">
                    <div class="footer-container">

                        <div class="footer-col">
                            <h3>The E-Commerce Website </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Rerum numquam repellat expedita modi accusantium soluta.
                            </p>
                        </div>

                        <div class="footer-col">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Blogs</a></li>
                            </ul>
                        </div>

                        <div class="footer-col">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">E-commerce</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>

                        <div class="footer-col">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="footer-bottom">
                        <p>© 2026 BuyTheWebsite. All rights reserved.</p>
                    </div>
                </footer>


            </div>
        </div>
    </footer>

</x-app-layout>
