    <div class="card-footer mt-3 mb-5" style="background-color: rgb(241, 238, 238)">
        <div class="row justify-content-center">
            <div class="col-md-3 ">
                <h5 class="mb-3"><a href="{{ url('/') }}">{{ config('app.name') }}</a>
                </h5>
                <i class="fa fa-phone"></i> + {{ config('app.phone') }}
                <br>
                <i class="fa fa-solid fa-envelope"></i> {{ config('app.email') }}
                <br>
                <i class="fa fa-solid fa-globe"></i> {{ config('app.social_media') }}
                <br>
                Copyright &copy; 2014-2023


            </div>
            <div class="col-md-3">
                <h5 class="mb-3">@lang('app.about_us')</h5>

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dicta quisquam temporibus, veniam rerum
                quis perferendis et eligendi sapiente magnam sint in modi? Adipisci voluptas deleniti iusto eveniet,
                pariatur aspernatur.

            </div>
            <div class="col-md-3">
                <h5 class="mb-3">@lang('app.shop_menu')</h5>
                <a href="{{ url('/') }}" class="ref">@lang('app.home')</a>
                <br>
                <a href="{{ url('/category') }}" class="ref">@lang('app.categories')</a>
                <br>
                <a href="{{ url('/product') }}" class="ref">@lang('app.product')</a>
                <br>
                <a href="{{ route('login') }}" class="ref">
                    @lang('app.login')</a>
                <br>
                <a href="{{ route('register') }}" class="ref"> @lang('app.register')</a>
            </div>
            <div class="col-md-3 ">
                <h5 class="mb-3">@lang('app.shop_location')</h5>

                <i class="fa fa-solid fa-location-arrow"></i> @lang('app.address') : {{ config('app.location') }}

                <br>

                <i class="fa fa-solid fa-globe"></i> @lang('app.google_map') : <a href="{{ config('app.map_link') }}"
                    target="_blank">{{ config('app.map_link') }}</a>


            </div>
        </div>
    </div>
