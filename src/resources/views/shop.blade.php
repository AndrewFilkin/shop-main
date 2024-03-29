@extends('layouts.topMenuAndStyles')

@section('title')
    Zay Shop - Product Listing Page
@stop

@section('body')


    @php
        $currentUrl = url()->current();
    @endphp

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">

                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                        </a>
                        <ul id="collapseThree" class="list-unstyled pl-3 active">
                            <li>
                                <input class="form-check-input" type="checkbox" value="" id="shirt">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <a class="text-decoration-none"
                                       href="{{$currentUrl . '?filter=shirt'}}">Футболка</a>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="checkbox" value="" id="suit">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <a class="text-decoration-none" href="{{$currentUrl . '?filter=suit'}}">Костюм</a>
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="checkbox" value="" id="trousers">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <a class="text-decoration-none"
                                       href="{{$currentUrl . '?filter=trousers'}}">Штаны</a>
                                </label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3"
                                   href="{{url('/shop?filter=all')}}">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3"
                                   href="{{url('/men?filter=all')}}">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none"
                                   href="{{url('/women?filter=all')}}">Women's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none"
                                   href="{{url('/children?filter=all')}}">Children's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    {{--product card--}}
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0"
                                     onclick="location.href='http://localhost/shop/{{$product->slug}}';">
                                    <img class="card-img rounded-0 img-fluid"
                                         src="{{ asset('assets/img/splash_screen_images/' . $product->splash_screen_image) }}">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        @auth
                                            <ul class="list-unstyled">
                                                <li><a class="btn btn-success text-white mt-2"
                                                       href="admin/shop-product-edit/{{$product->slug}}"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        @endauth
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('show.single.page', $product->slug) }}"
                                       class="h3 text-decoration-none">{{$product->name}}</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>{{$product->size}}</li>
                                        <li class="pt-2">
                                        <span
                                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span
                                                class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">${{$product->price}}</p>
                                </div>
                            </div>
                        </div>
                        {{--end product card--}}
                    @endforeach


                    <div div="row">
                        {{ $products->withQueryString()->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example"
                                 data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img"
                                                                 src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                               href="http://facebook.com/"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                               href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                               href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                               href="https://www.linkedin.com/"><i
                                    class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                               placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">list-unstyled
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Company Name
                            | Designed by <a rel="sponsored" href="https://templatemo.com"
                                             target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    @push('custom-scripts-body')
        <script src="{{ URL::asset('assets/js/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        {{--        <script src="{{ URL::asset('assets/js/templatemo.js') }}"></script>--}}
        <script src="{{ URL::asset('assets/js/checkboxShopProductFilter.js') }}"></script>
        <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

    @endpush
    <!-- End Script -->

@stop
