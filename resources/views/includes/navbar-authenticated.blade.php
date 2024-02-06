<nav
      class="navbar navbar-expand-lg navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="/index.html" class="navbar-brand">
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
          </ul>

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
                Hi, Angga
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/dashboard.html">Dashboard</a>
                <a class="dropdown-item" href="/dashboard-account.html"
                  >Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block cart-logo" href="#">
                <img src="/images/icon-cart-empty.svg" alt="" />
              </a>
            </li>
          </ul>
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="#" class="nav-link"> Hi, User </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>