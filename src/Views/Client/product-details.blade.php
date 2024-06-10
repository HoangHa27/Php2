<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    @include('layouts.partials.head')
</head>

<body class="crm_body_bg">
    @include('layouts.partials.nav')
    @include('layouts.partials.index')
    <section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @yield('content')
                <section class="section-sm">
                    <div class="container">
                        <div class="row">
                            <style>
                                .card{
                                    width: 500px;
                                }
                                .img{
                                    width: 80%;
                                    height: 50%;
                                    display: block;
                                    margin-left: auto;
                                    margin-right: auto;

                                }
                            </style>
                            <div class="col-md-4 mb-2 mt-2 ">
                                <div class="card  bg-light">
                                    <img class="img" style="max-height:100%" width="400px"
                                        src="{{ asset($product['img_thumbnail']) }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product['name'] }}</h4>
                                        <h4 class="text-danger">Giá Bán:{{ $product['price_regular'] }}</h4>
                                        <h4 class="card-title">Giá giảm:{{ $product['Price_Sale'] }}</h4>
                                        <h4 class="card-title">Review:{{ $product['overview'] }}</h4>

                                        <form action="{{ url('cart/add') }}" method="get">
                                            <input type="hidden" name="productID" value="{{ $product['id'] }}">
                                            <input type="number" min="1" name="quantity" value="1">
                                            <button type="submit">Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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