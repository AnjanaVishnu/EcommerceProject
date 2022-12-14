<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Minishop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('shop')}}">Shop</a>

                        <a class="dropdown-item" href="{{route('cart')}}">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                    </div>
                </li> --}}
                <li class="nav-item"><a href="{{route('shop')}}" class="nav-link">Shop</a></li>
                <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Category</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>

                @if(Auth::guard('clients')->user())
                
                <li class="nav-item cta cta-colored"><a href="{{route('cart')}}" class="nav-link">Cart<span class="icon-shopping_cart"></span></a></li>
                 <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">LogOut</a></li>
                @else
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
