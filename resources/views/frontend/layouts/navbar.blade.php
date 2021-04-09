<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('home.index') }}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('home.index') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        <a class="dropdown-item" href="{{ route('backend.home') }}">Profile</a>

                    </div>
                </li>
{{--                <li class="nav-item"><a href="" class="nav-link"></a></li>--}}
{{--                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdown04">--}}
{{--                        <a class="dropdown-item" href="shop.html">Shop</a>--}}
{{--                        <a class="dropdown-item" href="product-single.html">Single Product</a>--}}
{{--                        <a class="dropdown-item" href="room.html">Cart</a>--}}
{{--                        <a class="dropdown-item" href="checkout.html">Checkout</a>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>--}}
                <li class="nav-item cart"><a href="{{ route('cart.index') }}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{ session()->get('cart')->totalQty ?? "0"}}</small></span></a></li>
            </ul>
        </div>
    </div>
</nav>
