<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
    @stack('addon-style')
  </head>
  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" alt="" class="my-4" style="max-width:150px" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{route('admin-dashboard')}}"
              class="list-group-item list-group-item-action"
            >
              Dashboard
            </a>
            <a
              href="{{route('product.index')}}"
              class="list-group-item list-group-item-action {{(request()->is('admin/product')) ? 'active' : '' }}"
            >
              Products
            </a>
             <a
              href="{{route('product-gallery.index')}}"
              class="list-group-item list-group-item-action {{(request()->is('admin/product-gallery*')) ? 'active' : '' }}"
            >
              Galleries
            </a>
            <a
              href="{{route('category.index')}}"
              class="list-group-item list-group-item-action {{(request()->is('admin/category*')) ? 'active' : '' }}"
              >Categories</a
            >
            <a
              href="{{route('transaction.index')}}"
              class="list-group-item list-group-item-action"
              >Transactions</a
            >
           <a
              href="{{route('user.index')}}"
              class="list-group-item list-group-item-action {{(request()->is('admin/user*')) ? 'active' : '' }}"
              >Users</a
            >
            <a
              href="/dashboard-account.html"
              class="list-group-item list-group-item-action"
              >Sign Out</a
            >
          </div>
        </div>
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-dashboard navbar-light fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menuToggle"
              >
                &laquo;Menu
              </button>
              <button
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse justify-content-center"
                id="navbarSupportedContent"
              >
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
                      <a class="dropdown-item" href="/dashboard.html"
                        >Dashboard</a
                      >
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
                      <div class="cart-badge">3</div>
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
         
          {{-- Content --}}
          @yield('content')
        </div>
      </div>
    </div>
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menuToggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
       @stack('addon-script')
  </body>
</html>
