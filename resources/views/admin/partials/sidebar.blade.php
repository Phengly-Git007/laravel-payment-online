 <aside class="main-sidebar sidebar-dark-info bg-gray elevation-4">
     <a href="#" class="brand-link">
         <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
     </a>

     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('admin/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">
                     {{ Auth::user()->name }}
                 </a>
             </div>
         </div>


         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item ">
                     <a href="{{ route('dashboard.index') }}" class="nav-link @yield('dashboard')">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             @lang('admin.dashboard')
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('orders.index') }}" class="nav-link @yield('order')">
                         <i class="nav-icon fas fa-cart-plus"></i>
                         <p>
                             @lang('admin.order')
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('orders.all') }}" class="nav-link @yield('all-order')">
                         <i class="nav-icon fas fa-cart-plus"></i>
                         <p>
                             @lang('admin.total_order')
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('categories.index') }}" class="nav-link @yield('category')">
                         <i class="nav-icon fas fa-folder-plus"></i>
                         <p>
                             @lang('admin.categories')
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('products.index') }}" class="nav-link @yield('product')">
                         <i class="nav-icon fas fa-folder-plus"></i>
                         <p>
                             @lang('admin.product')
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('users.index') }}" class="nav-link @yield('user')">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             @lang('admin.user')
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('settings.index') }}" class="nav-link @yield('setting')">
                         <i class="nav-icon fas fa-solid fa-wrench"></i>
                         <p>
                             @lang('admin.setting')
                         </p>
                     </a>
                 </li>

                 <li class="nav-item ">
                     <a href="{{ route('logout') }}" class="nav-link "
                         onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-sign-out-alt"></i>
                         <p>@lang('admin.logout')</p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>
