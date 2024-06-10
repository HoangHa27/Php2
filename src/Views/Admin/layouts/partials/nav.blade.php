<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y ">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="{{ url('admin')}}">Sales</a></li>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Dark Menu</a></li>
            </ul>
        </li>

        {{-- Người dùng --}}
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>Người dùng</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/users')}}">Danh sách</a></li>
                <li><a href="{{ url('admin/users/create')}}">Thêm mới</a></li>
            </ul>
        </li>


        {{-- Sản phẩm --}}
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/6.svg') }}" alt>
                </div>
                <span>Sản phẩm</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/products')}}">Danh sách</a></li>
                <li><a href="{{ url('admin/products/create')}}">Thêm mới</a></li>
            </ul>
        </li>


        {{-- Danh mục --}}
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/7.svg') }}" alt>
                </div>
                <span>Danh mục sản phẩm</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/categorys')}}">Danh sách</a></li>
                <li><a href="{{ url('admin/categorys/create')}}">Thêm mới</a></li>
            </ul>
        </li>



          {{-- Bài Viết --}}
          <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Bài Viết </span>
            </a>
            <ul>
                <li><a href="{{ url('admin/posts')}}">Danh sách</a></li>
                <li><a href="{{ url('admin/posts/create')}}">Thêm mới</a></li>
            </ul>
        </li>

        
          {{-- Bài Viết --}}
          <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Quản Lý Đơn Hàng</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/orders')}}">Danh sách</a></li>
                <li><a href="{{ url('admin/orsers/create')}}">Thêm mới</a></li>
            </ul>
        </li>
    </ul>
</nav>