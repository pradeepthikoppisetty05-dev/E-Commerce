<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/img/chevron-left-svgrepo-com.svg" alt="Logo" width="28" class="me-2">
            <strong>E-Commerce</strong>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">

            <!-- Left Links (Authenticated) -->
            @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">Orders</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart.index') }}" class="nav-link">Cart</a>
                </li>
            </ul>
            @endauth

            <!-- Right Buttons -->
            <div class="d-flex align-items-center gap-2">

                <button class="btn btn-outline-primary" >
                    <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
                </button>
                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
                @endauth

                @guest
                <a href="{{ route('signup') }}" class="btn btn-primary btn-sm">Signup</a>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Login</a>
                @endguest

            </div>

        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
