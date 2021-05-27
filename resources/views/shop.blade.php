@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            {{-- Large plus screens, uncollapsed --}}
            <div class="col-lg-3 d-none d-lg-block">
                <div class="h2 pb-4">
                    Categories
                </div>
                <div>
                    <ul class="list-unstyled pl-3">
                        <li>
                            <a class="text-dark text-decoration-none {{ ! request()->category ? 'fw-bold' : '' }}" href="{{ route('shop.index', remove_query('category')) }}">All</a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a class="text-decoration-none {{ request()->category === $category->slug ? 'fw-bold' : '' }}" href="{{ route('shop.index', add_to_existing_queries(['category' => $category->slug])) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Large minus screens, collapsed --}}
            <div class="col-lg-3 d-lg-none">
                <div class="h2 pb-4">
                    <a data-bs-toggle="collapse" href="#categories" role="button" aria-expanded="false" aria-controls="categories">
                        Categories
                    </a>
                </div>
                <div class="collapse" id="categories">
                    <ul class="list-unstyled pl-3">
                        @foreach($categories as $category)
                            <li>
                                <a class="text-decoration-none {{ request()->category === $category->slug ? 'fw-bold' : '' }}" href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="text-dark text-decoration-none mr-3 {{ ! request()->sex ? 'fw-bold' : '' }}" href="{{ route('shop.index', remove_query('sex')) }}">All</a>
                            </li>
                            @foreach($sexes as $sex)
                                <li class="list-inline-item">
                                    <a class="text-dark text-decoration-none mr-3 {{ request()->sex === $sex->slug ? 'fw-bold' : '' }}" href="{{ route('shop.index', add_to_existing_queries(['sex' => $sex->slug])) }}">{{ $sex->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <small>
                                    <i class="fas fa-filter"></i>
                                </small>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-dark text-decoration-none mr-3 {{ request()->sort === 'low_to_high' ? 'fw-bold' : '' }}" href="{{ route('shop.index', add_to_existing_queries(['sort' => 'low_to_high'])) }}">Low to High</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-dark text-decoration-none {{ request()->sort === 'high_to_low' ? 'fw-bold' : '' }}" href="{{ route('shop.index', add_to_existing_queries(['sort' => 'high_to_low'])) }}">High to Low</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset('img/feature_prod_04.jpg') }}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li>
                                                <form action="{{ route('saveForLater.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <button class="btn btn-success text-white mt-2">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li><a class="btn btn-success text-white mt-2" href="{{ $product->path() }}"><i class="far fa-eye"></i></a></li>
                                            <li>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <button class="btn btn-success text-white mt-2">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ $product->path() }}" class="h3 text-decoration-none">{{ $product->name }}</a>
                                    {{--<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">--}}
                                    {{--    <li>M/L/X/XL</li>--}}
                                    {{--    <li class="pt-2">--}}
                                    {{--        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>--}}
                                    {{--        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>--}}
                                    {{--        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>--}}
                                    {{--        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>--}}
                                    {{--        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>--}}
                                    {{--    </li>--}}
                                    {{--</ul>--}}
                                    {{--<ul class="list-unstyled d-flex justify-content-center mb-1">--}}
                                    {{--    <li>--}}
                                    {{--        <i class="text-warning fa fa-star"></i>--}}
                                    {{--        <i class="text-warning fa fa-star"></i>--}}
                                    {{--        <i class="text-warning fa fa-star"></i>--}}
                                    {{--        <i class="text-muted fa fa-star"></i>--}}
                                    {{--        <i class="text-muted fa fa-star"></i>--}}
                                    {{--    </li>--}}
                                    {{--</ul>--}}
                                    <p class="mb-0">{{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div div="row">
                    {{-- append query strings when you change to next page --}}
                    {{ $products->appends(request()->input())->links() }}
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
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
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
@endsection
