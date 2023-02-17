<nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <div class="container mt-0">
        <a class="navbar-brand" href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
        <b><i class="fa fa-phone"></i> + {{ config('app.phone') }}</b>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}"><b>Home</b> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('category') }}"><b>Categories</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('product') }}"><b>Product</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('view-wishlist-item') }}">
                        <b>Wishlist <span class="badge badge-pill bg-secondary wishlist-count"
                                style="border-radius: 0.5rem">0</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('view-cart-item') }}">
                        <b>Cart <span class="badge badge-pill bg-danger cart-count"
                                style="border-radius: 0.5rem">0</span></b>
                    </a>
                </li>

                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role == 1)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>(User : {{ Auth::user()->name }})</b>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                                    <a class="dropdown-item"
                                        href="{{ url('/logout') }}"onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                        @if (Auth::user()->role == 0)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>(User : {{ Auth::user()->name }})</b>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ url('my-orders') }}">My Order</a>
                                    <a class="dropdown-item" href="{{ url('password') }}">Password</a>
                                    <a class="dropdown-item"
                                        href="{{ url('/logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item "><a class="nav-link" href="{{ url('/login') }}"><b>Login</b></a></li>
                        <li class="nav-item "><a class="nav-link" href="{{ url('/register') }}"><b>Register</b></a></li>
                    @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
