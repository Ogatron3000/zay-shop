<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() < 1) {
            return redirect()->route('cart.index');
        }

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51ItwSHD3zArsPzSwj2vMH8SXc0kGaoJyMUpNdMGcP8XMk4T0mOGgtcLVa0J9CpmRXf2fsArFAS3HLEO1JOst81K400Tj0TWT8n');

        $contents = Cart::instance('default')->content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        $intent = \Stripe\PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'usd',
            'metadata' => [
                'contents' => $contents,
                'quantity' =>  Cart::count()
            ],
        ]);

        return view('checkout', compact('intent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function store(Request $request)
    {
         //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
