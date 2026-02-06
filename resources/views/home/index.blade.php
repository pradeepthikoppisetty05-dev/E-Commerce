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

    <div>
        @include('products')
    </div>
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
                                easy, secure, and enjoyable for everyoneee.
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
