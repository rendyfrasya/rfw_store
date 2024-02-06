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
          class="navbar-collapse collapse order-1 order-md-0 dual-collapse"
          id="navbarResponsive"
        >
          <div class="mx-auto order-0">
            <ul class="navbar-nav list">
              <li class="nav-item active">
                <a href="{{route('home')}}" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories')}}" class="nav-link">Categories</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Rewards</a>
              </li>
              <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">Sign Up</a>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav align-self-end">
            <li class="nav-item">
              <a href="{{route('login')}}" class="btn btn-success nav-link px-4 text-white"
                >Log In</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>