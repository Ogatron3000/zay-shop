<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- Stripe --}}
    <script src="https://js.stripe.com/v3/"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Start Top Nav -->
    @include('_partials.nav')
    <!-- Close Top Nav -->

    {{-- Main Content --}}
    @yield('content')

    <!-- Start Footer -->
    @include('_partials.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("js/app.js") }}"></script>
    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe('pk_test_51ItwSHD3zArsPzSwdFW58s4JkNn04nDN78J4Viar6ikX0LL5Qqto27h2oZwiKzcIx6l9H7wplzE19Bs6mWURSC3E00MkBKMyX8');
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function() {
            // Create a new Checkout Session using the server-side endpoint you
            // created in step 3.
            fetch('/checkout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
                .then(function(response) {
                    return response.json();
                })
                .then(function(session) {
                    return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function(result) {
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, you should display the localized error message to your
                    // customer using `error.message`.
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        });
    </script>
    <!-- End Script -->
</body>

</html>
