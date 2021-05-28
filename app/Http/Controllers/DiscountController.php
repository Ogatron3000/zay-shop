<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Cart;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::findByCode($request->code)->first();

        if (! $coupon) {
            return redirect()->route('checkout.index')->withErrors('Invalid coupon code.');
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $coupon->couponable->discount(Cart::subtotal())
        ]);

        return redirect()->route('checkout.index')->with('success_message', 'Coupon applied successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return redirect()->route('checkout.index')->with('success_message', 'Coupon removed successfully.');
    }
}
