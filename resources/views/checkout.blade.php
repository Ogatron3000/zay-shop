@extends('layouts.app')

@section('content')

    <section class="bg-light">
        <div class="cart-section container">
            <div class="card my-5">
                <div class="card-body p-5">
                    <h1>Checkout</h1>
                    <div class="checkout-section">
                        <div>
                            <form action="#" id="payment-form" data-secret="{{ $intent->client_secret }}">
                                <h2>Billing Details</h2>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="">
                                </div>

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control" id="province" name="province" value="">
                                    </div>
                                </div> <!-- end half-form -->

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="postalcode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="">
                                    </div>
                                </div> <!-- end half-form -->

                                <div class="spacer"></div>

                                <h2>Payment Details</h2>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>

                                <div class="form-group">
                                    <label for="card-element">Card</label>
                                    <div class="form-control py-3" id="card-element">
                                        <!-- Elements will create input elements here -->
                                    </div>

                                    <div id="card-errors" role="alert" class="text-danger"></div>
                                </div>

                                <div class="spacer"></div>

                                <button type="submit" id="complete-order" class="btn btn-success btn-lg" name="submit">Complete Order</button>


                            </form>
                        </div>



                        <div class="checkout-table-container">
                            <h2>Your Order</h2>

                            <div class="checkout-table">
                                @foreach(Cart::instance('default')->content() as $item)
                                    <div class="checkout-table-row">
                                        <div class="checkout-table-row-left">
                                            <img src="{{ asset('img/feature_prod_04.jpg') }}" alt="item" class="checkout-table-img">
                                            <div class="checkout-item-details">
                                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                                            </div>
                                        </div> <!-- end checkout-table -->

                                        <div class="checkout-table-row-right">
                                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                                        </div>
                                    </div> <!-- end checkout-table-row -->
                                @endforeach

                            </div> <!-- end checkout-table -->

                            <div class="checkout-totals">
                                <div class="checkout-totals-left">
                                    Subtotal <br>
                                    {{--Discount (10OFF - 10%) <br>--}}
                                    Tax (5%) <br>
                                    <span class="checkout-totals-total">Total</span>

                                </div>

                                <div class="checkout-totals-right">
                                    {{ present_price(Cart::instance('default')->subtotal()) }} <br>
                                    {{---$750.00 <br>--}}
                                    {{ present_price(Cart::tax()) }} <br>
                                    <span class="checkout-totals-total">{{ present_price(Cart::instance('default')->total()) }}</span>

                                </div>
                            </div> <!-- end checkout-totals -->

                            {{--<a href="#" class="have-code">Have a Code?</a>--}}

                            {{--<div class="have-code-container">--}}
                            {{--    <form action="#">--}}
                            {{--        <input type="text">--}}
                            {{--        <input type="submit" class="button" value="Apply">--}}
                            {{--    </form>--}}
                            {{--</div>--}}
                        </div>

                    </div> <!-- end checkout-section -->
                </div>
            </div>
        </div>
    </section>

@endsection
