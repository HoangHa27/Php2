<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>
    <style>
        .bh{
            width:50%;
            
        }

        .form-control{
            
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    @include('layouts.partials.head')
</head>

<body class="crm_body_bg">


    @include('layouts.partials.nav')

    <section class="main_content dashboard_part large_header_bg">
        @include('layouts.partials.index')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @yield('content')

                <div class="container">
                    <h1 class="mt-5 mb-3 text-center">Login</h1>

                    @if (!empty($_SESSION['error']))
                    <div class="alert alert-warning mt-3 mb-3">
                        {{ $_SESSION['error'] }}
                    </div>

                    @php
                    unset($_SESSION['error']);
                    @endphp
                    @endif

                    <div class="bh">
                        <form action="{{ url('handle-login') }}" method="POST">
                            <div class="mb-3 mt-3 ">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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