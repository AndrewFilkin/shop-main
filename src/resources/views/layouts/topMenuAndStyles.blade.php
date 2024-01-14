<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- basket-right-side-menu -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/basket-right-side-menu.css') }}">

    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/open-modal-window.css') }}">

    <!-- basket-right-side-menu -->


    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome.min.css') }}">

    <!-- basket-right-side-menu -->
    <script type="module" src="{{ URL::asset('assets/js/basket-right-side-menu.js')}}"></script>

    <!-- open-modal-window -->
    <script type="module" src="{{ URL::asset('assets/js/open-modal-window.js')}}"></script>
    <script type="module" src="{{ URL::asset('assets/js/open-modal-window-login.js')}}"></script>


    <title>@yield('title')</title>

    @stack('custom-scripts')
    @stack('custom-style')

</head>
<body>


<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw"></i></a>
                &nbsp;&nbsp;@auth()
                    <a class="text-light" href="{{route('admin.product.create.page')}}">Create product</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="/">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop?filter=all">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                   data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i id="menu-icon" class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>


                    @if(session()->has('orders'))
                        @php
                            $orders = session()->get('orders');
                            $countOrders = count(session()->get('orders'));
                        @endphp
                        <span
                                class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">{{$countOrders}}</span>
                </a>
                <!-- basket-right-side-menu -->
                <div id="side-menu">
                    @foreach ($orders as $key => $order)
                        @unless(isset($order['name']))
                            @break
                        @endunless
                        <div class="links">
                            <a href="#">{{ $order['name'] }}</a>
                            <a href="{{route('shopping.cart.item.delete', $order['name'])}}"
                               class="close-link">X</a>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- end basket-right-side-menu -->


                @guest
                    <button id="openModalBtn">Регистрация</button>
                    <div id="registrationModal" class="modal">
                        <div class="modal-content">
                            <span class="close" id="closeModalBtn">&times;</span>
                            <h2>Регистрация</h2>
                            <form method="POST" action="{{route('auth.register')}}">
                                @csrf
                                <input type="text" placeholder="User Name" name="name">
                                <input type="email" placeholder="Email" name="email">
                                <input type="password" placeholder="Пароль" name="password">
                                <input type="password" placeholder="Подтвердить пароль" name="password_confirmation">
                                <button type="submit">Войти</button>
                            </form>
                            <button id="googleLoginBtn" class="google-login">Войти через Google</button>
                        </div>
                    </div>

                    <button id="openModalBtnLogin">Вход</button>
                    <div id="registrationModalLogin" class="modal">
                        <div class="modal-content">
                            <span class="close" id="closeModalBtnLogin">&times;</span>
                            <h2>Вход</h2>
                            <form method="POST" action="{{ route('auth.login') }}">
                                @csrf
                                <input type="text" placeholder="User Name" id="name" name="name">
                                <input type="password" placeholder="Пароль" id="password" name="password">
                                <button type="submit">Войта</button>
                            </form>
                            <button id="googleLoginBtn" class="google-login">Войти через Google</button>
                        </div>
                    </div>
                @endguest
                @auth
                    {{auth()->user()->name}}
                    <a href="{{ route('auth.logout') }}">
                        <button id="openModalBtnLogin">Logout</button>
                    </a>
                @endauth


                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    {{--                    <span--}}
                    {{--                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>--}}
                </a>
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

@yield('body')

@stack('custom-scripts-body')
</body>

</html>
