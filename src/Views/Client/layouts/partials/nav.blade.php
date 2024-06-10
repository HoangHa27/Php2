<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="index.html">
      <img class="img-fluid" width="100px" src="{{ asset('assets/client/images/logo.png')}}"
        alt="Reader | Hugo Personal Blog Template">
    </a>
    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://localhost/fpoly-base-web3014/">Trang Chủ </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ url('products')}}" >Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Liên Hệ</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="shop.html">Shop</a>
        </li>
      </ul>
    </div>

    <div class="order-2 order-lg-3 d-flex align-items-center ">
      <nav>
        @if (!isset($_SESSION['user']))
            <a class="btn btn  mr-3" href="{{ url('login') }}">Đăng nhập</a>
        @endif

        @if (isset($_SESSION['user']))
            <a class="btn btn mr-3" href="{{ url('logout') }}">Đăng xuất</a>
        @endif
    </nav>
      <!-- search -->
      <form class="search-bar">
        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
      </form>
      
      <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
        <i class="ti-menu"></i>
      </button>
    </div>

  </nav>