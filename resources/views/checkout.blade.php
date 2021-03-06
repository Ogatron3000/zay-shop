@extends('layouts.app')

@section('content')

    <section class="bg-light">
        <div class="cart-section container">
            <div class="card my-5">
                <div class="card-body p-5">
                    <h1>Checkout</h1>

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

                    <div class="checkout-section">
                        <div>
                            <form action="#" id="payment-form" data-secret="{{ $intent->client_secret }}">
                                <h2>Billing Details</h2>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old("email") }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old("address") }}" required>
                                </div>

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old("city") }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ old("state") }}" required>
                                    </div>
                                </div> <!-- end half-form -->

                                <div class="half-form">
                                    <div class="form-group">
                                        <label for="postalcode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old("postalcode") }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old("phone") }}" required>
                                    </div>
                                </div> <!-- end half-form -->

                                {{--<div class="spacer"></div>--}}

                                <h2>Payment Details</h2>

                                <div class="form-group">
                                    <label for="owner">Card Owner</label>
                                    <input type="text" class="form-control" id="owner" name="owner" value="{{ old("owner") }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="card-element">Card</label>
                                    <div class="form-control py-3" id="card-element">
                                        <!-- Elements will create input elements here -->
                                    </div>

                                    <div id="card-errors" role="alert" class="text-danger"></div>
                                </div>

                                {{--<div class="spacer"></div>--}}

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
                                                <div class="checkout-table-price">{{ present_price($item->subtotal()) }}</div>
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
                                    @if(session()->has('coupon'))
                                        Discount ({{ session()->get('coupon')['code'] }})
                                        <form action="{{ route('coupon.destroy') }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn p-0">
                                                <i class="far fa-times-circle"></i>
                                            </button>
                                        </form> <br>
                                        Discounted Subtotal <br>
                                    @endif
                                    Tax (5%) <br>
                                    <span class="checkout-totals-total">Total</span>

                                </div>

                                <div class="checkout-totals-right">
                                    {{ present_price(Cart::instance('default')->subtotal()) }} <br>
                                    @if(session()->has('coupon'))
                                        - {{ present_price(session()->get('coupon')['discount']) }} <br>
                                        {{ present_price($prices->get('subtotalAfterDiscount')) }} <br>
                                    @endif
                                    {{ present_price($prices->get('taxOnSubtotalAfterDiscount')) }} <br>
                                    <span class="checkout-totals-total">{{ present_price($prices->get('totalAfterDiscount')) }}</span>

                                </div>
                            </div> <!-- end checkout-totals -->

                            @if( ! session()->has('coupon'))
                                <div>
                                    <div class="py-3">
                                        <a href="#">Have a Code?</a>
                                    </div>

                                    <div class="have-code-container rounded">
                                        <form action="{{ route('coupon.store') }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="code">
                                            <button type="submit" class="btn btn-success" name="submit">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div> <!-- end checkout-section -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('extra-js')
    <script type="text/javascript">
        let stripe = Stripe('pk_test_51ItwSHD3zArsPzSwdFW58s4JkNn04nDN78J4Viar6ikX0LL5Qqto27h2oZwiKzcIx6l9H7wplzE19Bs6mWURSC3E00MkBKMyX8');

        // Set up Stripe.js and Elements to use in checkout form
        let elements = stripe.elements();
        let style = {
            base: {
                color: "#32325d",
            }
        };

        let card = elements.create("card", {
            style: style,
            hidePostalCode: true
        });
        card.mount("#card-element")

        let form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
            ev.preventDefault();

            // Disable the submit button to prevent repeated clicks
            document.getElementById('complete-order').disabled = true;

            // If the client secret was rendered server-side as a data-secret attribute
            // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
            stripe.confirmCardPayment(form.dataset.secret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        email: document.getElementById('email').value,
                        name: document.getElementById('owner').value,
                        phone: document.getElementById('phone').value,
                        address: {
                            city: document.getElementById('city').value,
                            line1: document.getElementById('address').value,
                            postal_code: document.getElementById('city').value,
                            state: document.getElementById('state').value,
                        },
                    }
                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    let errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    // Enable the submit button
                    document.getElementById('complete-order').disabled = false;
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        // Show a success message to your customer
                        // There's a risk of the customer closing the window before callback
                        // execution. Set up a webhook or plugin to listen for the
                        // payment_intent.succeeded event that handles any business critical
                        // post-payment actions.
                        axios.post('/thanks', {
                            orderStatus: result.paymentIntent.status,
                        })
                            .then(function (response) {
                                window.location.replace("{{ route('thanks.index', ['order' => 'succeeded']) }}");
                            })
                            .catch(function (error) {
                                window.location.replace("{{ route('checkout.index') }}");
                            });
                    }
                }
            });
        });
    </script>
@endsection
