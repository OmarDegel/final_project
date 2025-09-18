<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">MasteryPath</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">{{__("site.Home")}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('courses') }}">{{__("site.Courses")}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">{{__("site.About")}}</a>
        </li>

        <!-- Dropdown المستخدم -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i> {{ session('user')->first_name ?? 'User' }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            @if(session()->has('user'))
            <li>
              <a class="dropdown-item" href="{{ route('users.edit', session('user')->id) }}">
                <i class="fas fa-user me-2"></i> {{ __('site.profile') }}
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt me-2"></i> {{ __('site.logout') }}
              </a>
            </li>
            @else
            <!-- زرارين Login و Register -->
            <li class="nav-item">
            <li>
              <a class="dropdown-item" href="{{ route('login.view') }}">
                {{ __('site.login') }}
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('register.view') }}">
                {{ __('site.register') }}
              </a>
            </li>

            @endif
          </ul>
        </li>


      </ul>
    </div>
  </div>
</nav>