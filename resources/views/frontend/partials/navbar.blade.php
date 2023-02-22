<nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <div class="container mt-0">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <i class="fa fa-phone"></i> + {{ config('app.phone') }}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="{{ url('/') }}">
                        @lang('app.home')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('category') }}">
                        @lang('app.categories')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('product') }}">
                        @lang('app.product')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('view-wishlist-item') }}">
                        @lang('app.wishlist') <span class="badge badge-pill bg-primary wishlist-count"
                            style="border-radius: 1rem;">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('view-cart-item') }}">
                        @lang('app.cart') <span class="badge badge-pill bg-danger cart-count"
                            style="border-radius: 1rem">0</span>
                    </a>
                </li>

                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role == 1)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                        <i class="fa fa-solid fa-solar-panel"></i>
                                        @lang('app.dashboard')
                                    </a>
                                    <a class="dropdown-item" href="{{ url('password') }}">
                                        <i class="fa fa-solid fa-lock"></i>
                                        @lang('app.password')
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ url('/logout') }}"onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-solid fa-lock-open"></i>
                                        @lang('app.logout')
                                    </a>
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
                                    {{ Auth::user()->name }} <i class="fa fa-user"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ url('my-orders') }}">
                                        <i class="fa fa-solid fa-folder-plus"></i>
                                        @lang('app.my_order')
                                    </a>
                                    <a class="dropdown-item" href="{{ url('password') }}">
                                        <i class="fa fa-solid fa-lock"></i>
                                        @lang('app.password')</a>
                                    <a class="dropdown-item"
                                        href="{{ url('/logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-solid fa-lock-open"></i>
                                        @lang('app.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/login') }}">
                                @lang('app.login') <i class="fa fa-door-open"></i>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/register') }}">
                                @lang('app.register') <i class="fa fa-address-card"></i>
                            </a>
                        </li>
                    @endif
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            @lang('app.language')
                            <img src="{{ asset('images/flag') }}/{{ app()->getLocale() }}.png"
                                alt="{{ app()->getLocale() }}" style="height:1.5rem; top: -2px; position:relative;">
                        </a>
                        <form action="{{ route('locale') }}" method="POST"
                            class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @csrf
                            <span class="dropdown-item dropdown-header text-center "><strong>Localization</strong></span>
                            <div class="dropdown-divider"></div>
                            <button type="submit" name="en" value="en" class="dropdown-item">
                                <img src="{{ asset('images/flag/en.png') }}" alt="en" class="mr-2"
                                    style="height:1.3rem; top:-2px;position:relative">
                                <span class="float-right text-muted text-sm float-end">english</span>
                            </button>
                            <button type="submit" name="kh" value="kh" class="dropdown-item">
                                <img src="{{ asset('images/flag/kh.png') }}" alt="kh" class="mr-2"
                                    style="height:1.3rem; top:-2px;position:relative">
                                <span class="float-right text-muted text-sm float-end">khmer</span>
                            </button>
                            <button type="submit" name="ch" value="ch" class="dropdown-item">
                                <img src="{{ asset('images/flag/ch.png') }}" alt="ch" class="mr-2"
                                    style="height:1.3rem; top:-2px;position:relative">
                                <span class="float-right text-muted text-sm float-end">chinese</span>
                            </button>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
