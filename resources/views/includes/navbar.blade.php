 <nav
      class="navbar navbar-expand-lg navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">
          <img src="/images/logo.svg" alt="Logo" class="" />
        </a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarResponsive"
        >
        <div class="mx-auto order-0">
          <ul class="navbar-nav list">
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{route('categories')}}" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Rewards</a>
            </li>
            @guest
            <li class="nav-item">
              <a href="{{route('register')}}" class="nav-link">Sign Up</a>
            </li>
          </ul>
         </div>
         <ul class="navbar-nav align-self-end">
          <li class="nav-item">
            <a href="{{route('login')}}" type="button" class="btn btn-success nav-link px-4 text-white">Log In</a>
          </li>
         </ul>
          @endguest
          </div>
          @auth
          <ul class="navbar-nav d-none d-lg-flex login-btn">
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                Hi, {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                <a class="dropdown-item" href="{{route('dashboard-settings-account')}}"
                  >Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block cart-logo" href="{{route('cart')}}">
                @php $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count(); @endphp
                @if ($carts > 0)
                    <img src="/images/icon-cart-filled.svg" alt="" />
                    <div class="cart-badge">{{$carts}}</div>
                @else
                    <img src="/images/icon-cart-empty.svg" alt="" />
                @endif
              </a>
            </li>
          </ul>
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>



