<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>You Might Also Like</h4>
        </div>

        <!--You Might Also Like-->
        <div class="row">
            @foreach($mightAlsoLike as $product)
                <div class="col-12 col-md-3 mb-4">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img src="{{ asset('img/feature_prod_04.jpg') }}" class="card-img-top" alt="...">
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
                            <a href="{{ $product->path() }}" class="h3 text-decoration-none text-dark">{{ $product->name }}</a>
                            <div class="text-muted text-right">{{ $product->presentPrice() }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
