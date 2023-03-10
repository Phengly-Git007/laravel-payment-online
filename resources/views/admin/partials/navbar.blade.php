  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                      class="fas fa-solid fa-backward"></i> </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ url('/') }}" class="nav-link"> <i class="nav-icon fas fa-home"></i> @lang('admin.home')</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('categories.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-folder-plus"></i> @lang('admin.categories')</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('products.index') }}" class="nav-link"><i class="nav-icon fas fa-folder-plus"></i>
                  @lang('admin.product')</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('orders.index') }}" class="nav-link"><i class="nav-icon fas fa-cart-plus"></i>
                  @lang('admin.order')</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('users.index') }}" class="nav-link"> <i class="nav-icon fas fa-users"></i>
                  @lang('admin.user')</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('dashboard.index') }}" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                  @lang('admin.dashboard')</a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('settings.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-wrench"></i>
                  @lang('admin.setting')
              </a>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">

          <a class="nav-link" data-toggle="dropdown" href="#">
              <img src="{{ asset('images/flag') }}/{{ app()->getLocale() }}.png" alt="{{ app()->getLocale() }}"
                  style="height:1.3rem; top:-2px;position:relative">
              <span class="badge badge-secondary navbar-badge">{{ app()->getLocale() }}</span>
          </a>
          <form action="{{ route('locale') }}" method="POST"
              class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              @csrf
              <span class="dropdown-item dropdown-header"><strong>Localization</strong></span>
              <div class="dropdown-divider"></div>
              <button type="submit" name="en" value="en" class="dropdown-item">
                  <img src="{{ asset('images/flag/en.png') }}" alt="en" class="mr-2"
                      style="height:1.3rem; top:-2px;position:relative">
                  english
                  <span class="float-right text-muted text-sm">English</span>
              </button>
              <div class="dropdown-divider"></div>
              <button type="submit" name="kh" value="kh" class="dropdown-item">
                  <img src="{{ asset('images/flag/kh.png') }}" alt="en" class="mr-2"
                      style="height:1.3rem; top:-2px;position:relative">
                  khmer
                  <span class="float-right text-muted text-sm">Khmer</span>
              </button>
          </form>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 mr-3 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Brad Diesel
                                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">Call me whenever you can...</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('admin/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 img-circle mr-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  John Pierce
                                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">I got your message bro</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="{{ asset('admin/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                              class="img-size-50 img-circle mr-3">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  Nora Silvester
                                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm">The subject goes here</p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> 4 new messages
                      <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-users mr-2"></i> 8 friend requests
                      <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-file mr-2"></i> 3 new reports
                      <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>

      </ul>
  </nav>
  <!-- /.navbar -->
