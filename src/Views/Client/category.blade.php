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

    <section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @yield('content')
                <section class="section-sm">
                    <div class="container">
                        <div class="row">

                            @foreach ($category as $category)
                            <div class="col-lg-3 col-md-4 col-sm-6 ">
                                <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                                    <a href="{{ url('products/' . $product['id']) }}">
                                        <img class="card-img-top" style="height:150px"
                                            src="{{ asset($product['img_thumbnail']) }}" alt="Card image">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="text-uppercase mb-3">
                                            <a href="{{ url('products/' . $product['name']) }}">
                                                {{ $product['name'] }}</a>
                                        </h4>
                                        <p class="h4 text-muted font-weight-light mb-3"></p>
                                        <p class="h6">
                                            <a href="{{ url('products/' . $product['id']) }}">
                                                {{ $product['price_regular'] }}</a>
                                        </p>
                                        <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}"
                                            class="btn btn-info "><i class=" bi bi-cart4"></i></a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
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