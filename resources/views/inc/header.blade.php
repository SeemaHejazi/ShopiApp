<header class="app-header navbar">
    <div class="full-width">
        <div class="top-right links">
            <a href="{{ url('/products') }}">All Books</a>
            <a href="{{ url('/products/limit/true') }}">Shop In Stock</a>
            <a href="{{ url('/cart') }}">View Cart <span class="badge cart-badge">{{ count(session('cart')) }}</span></a>

            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endif
        </div>

        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="content">
                <div class="title">
                    {{config('app.name', 'ShopiApp')}}
                </div>
            </div>
        </a>
    </div>
</header>