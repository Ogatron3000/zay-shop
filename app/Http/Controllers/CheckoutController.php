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
        //
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
        $items = [];
        foreach (Cart::instance('default')->content() as $item) {
            $items[] = [
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name' => $item->name,
                    ],
                    'unit_amount'  => $item->price,
                ],
                'quantity'   => 1,
            ];
        }

        Stripe::setApiKey('sk_test_51ItwSHD3zArsPzSwj2vMH8SXc0kGaoJyMUpNdMGcP8XMk4T0mOGgtcLVa0J9CpmRXf2fsArFAS3HLEO1JOst81K400Tj0TWT8n');

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $items,
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/success',
            'cancel_url' => 'http://127.0.0.1:8000/cart',
        ]);

        Cart::instance('default')->destroy();

        return response()->json(['id' => $session->id]);
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
