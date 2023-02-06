<nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <div class="container mt-0">
        <a class="navbar-brand" href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
        <b><i class="fa fa-phone"></i> +885016629629</b>
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
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><b>Login</b></a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><b>Register</b></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>(User : {{ Auth::user()->name }})</b>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{ url('my-orders') }}" class="dropdown-item">My Order</a>
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
