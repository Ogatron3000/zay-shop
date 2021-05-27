@extends('layouts.app')

@section('content')
    <section class="bg-light">
        <div class="cart-section container">
            <div class="card my-5">
                <div class="card-body p-5">
                    <h2>{{ Cart::instance('default')->count() }} item(s) in Shopping Cart</h2>

                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="cart-table">
                        @foreach(Cart::content() as $item)
                            <div class="cart-table-row">
                                <div class="cart-table-row-left">
                                    <a href="#"><img src="{{ asset('img/feature_prod_04.jpg') }}" alt="item" class="cart-table-img"></a>
                                    <div class="cart-item-details">
                                        <div class="cart-table-item"><a href="{{ $item->model->path() }}">{{ $item->model->name }}</a></div>
                                        <div class="cart-table-description">{{ $item->model->details }}</div>
                                    </div>
                                </div>
                                <div class="cart-table-row-right">
                                    <div class="cart-table-actions">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="link-button">Remove</button>
                                        </form>
                                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                            @csrf
                                            <button class="link-button">Save for Later</button>
                                        </form>
                                    </div>
                                    <div>
                                        <select class="quantity" data-id="{{ $item->rowId }}">
                                            @for($i = 1; $i < 6; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : ''}} value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>{{ present_price($item->subtotal()) }}</div>
                                </div>
                            </div>
                        @endforeach<!-- end cart-table-row -->

                    </div> <!-- end cart-table -->

                    <div class="cart-totals rounded">
                        <div class="cart-totals-left">
                            Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                        </div>

                        <div class="cart-totals-right">
                            <div>
                                 <br>
                                Tax (5%) <br>
                                <span class="cart-totals-total">Total</span>
                            </div>
                            <div class="cart-totals-subtotal">
                                {{ present_price(Cart::instance('default')->subtotal()) }} <br>
                                {{ present_price(Cart::instance('default')->tax()) }} <br>
                                <span class="cart-totals-total">{{ present_price(Cart::instance('default')->total()) }}</span>
                            </div>
                        </div>
                    </div> <!-- end cart-totals -->

                    <div class="cart-buttons">
                        <a href="{{ route('shop.index') }}"><button type="submit" class="btn btn-outline-success btn-lg" name="submit">Continue Shopping</button></a>
                        <a href="{{ route('checkout.index') }}"><button type="submit" class="btn btn-success btn-lg" name="submit">Proceed to Checkout</button></a>
                    </div>

                    <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

                    <div class="saved-for-later cart-table">
                        @foreach(Cart::instance('saveForLater')->content() as $item)
                            <div class="cart-table-row">
                                <div class="cart-table-row-left">
                                    <a href="#"><img src="{{ asset('img/feature_prod_04.jpg') }}" alt="item" class="cart-table-img"></a>
                                    <div class="cart-item-details">
                                        <div class="cart-table-item"><a href="{{ $item->model->path() }}">{{ $item->model->name }}</a></div>
                                        <div class="cart-table-description">{{ $item->model->details }}</div>
                                    </div>
                                </div>
                                <div class="cart-table-row-right">
                                    <div class="cart-table-actions">
                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="link-button">Remove</button>
                                        </form>
                                        <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                            @csrf
                                            <button class="link-button">Add to Cart</button>
                                        </form>
                                    </div>
                                    <div>
                                        {{--<select class="quantity" data-id="{{ $item->rowId }}">--}}
                                        {{--    @for($i = 1; $i < 6; $i++)--}}
                                        {{--        <option selected="" value="{{41 }}">123</option>--}}
                                        {{--    @endfor--}}
                                        {{--</select>--}}
                                    </div>
                                    <div>{{ $item->model->price }}</div>
                                </div>
                            </div>
                        @endforeach <!-- end cart-table-row -->

                    </div> <!-- end saved-for-later -->

                </div>

            </div>
        </div>
    </section>

    <!-- Start You Might Also Like -->
    @include('_partials.might-also-like')
    <!-- End You Might Also Like -->

@endsection

@section('extra-js')
    <script type="text/javascript">
        const quantity = [ ...document.querySelectorAll(".quantity") ];
        quantity.forEach((element) => {
            const id = element.getAttribute('data-id')
            element.addEventListener('change', () => {
                axios.patch(`/cart/${id}`, {
                    quantity: element.value,
                })
                    .then(function (response) {
                        window.location.replace("{{ route('cart.index') }}");
                    })
                    .catch(function (error) {
                        window.location.replace("{{ route('cart.index') }}");
                    });
            })
        })
        // quantity.addEventListener('change', () => alert('yo'));
    </script>
@endsection
