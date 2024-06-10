<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>
    <style>
        .bh {
            width: 50%;

        }

        .form-control {}
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    @include('layouts.partials.head')
</head>

<body class="crm_body_bg">


    @include('layouts.partials.nav')

    <section class="main_content dashboard_part large_header_bg">

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @yield('content')
                    <div class="row">
                        @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
                        <div class="col-md-8 mb-2 mt-2">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                        <th>Thành tiền</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                                    @endphp
                                    @foreach ($cart as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <img src="{{ asset($item['img_thumbnail']) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            @php
                                            $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a class="btn btn-danger" href="{{ $url }}">Giảm</a>

                                            {{ $item['quantity'] }}

                                            @php
                                            $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a class="btn btn-primary" href="{{ $url }}">Tăng</a>
                                        </td>
                                        <td>
                                            {{ $item['price_sale'] ?: $item['price_regular'] }}
                                        </td>
                                        <td>
                                            {{ $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']) }}
                                        </td>
                                        <td>
                                            @php
                                            $url = url('cart/remove') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a onclick="return confirm('Có chắn không?')" href="{{ $url }}">Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-4 mb-2 mt-2">
                            <form action="{{ url('order/checkout') }}" method="POST">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name"
                                        value="{{ $_SESSION['user']['name'] ?? null }}" placeholder="Enter name"
                                        name="user_name">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email"
                                        value="{{ $_SESSION['user']['email'] ?? null }}" placeholder="Enter email"
                                        name="user_email">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <input type="text" class="form-control" id="phone"
                                        value="{{ $_SESSION['user']['phone'] ?? null }}" placeholder="Enter phone"
                                        name="user_phone">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="address"
                                        value="{{ $_SESSION['user']['address'] ?? null }}" placeholder="Enter address"
                                        name="user_address">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="address"
                                        value="{{ $_SESSION['user']['shipping_address'] ?? null }}" placeholder="Enter address"
                                        name="shipping_address">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.footer')
    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @include('layouts.partials.js')

    @yield('js')
</body>

</html>