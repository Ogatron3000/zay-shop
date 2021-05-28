<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\FixedValueCoupon;
use App\Models\PercentOffCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(10);

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = [
            get_name(FixedValueCoupon::class),
            get_name(PercentOffCoupon::class)
        ];

        return view('admin.coupons.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        $attributes = $request->validated();

        $couponTypeClass = 'App\\Models\\' . implode('', explode(' ', $attributes['type']));

        $couponTypeInstance = call_user_func($couponTypeClass . '::create', ['discount' => $attributes['discount']]);

        Coupon::create([
            'code' => $attributes['code'],
            'couponable_id' => $couponTypeInstance->id,
            'couponable_type' => $couponTypeClass
        ]);

        return redirect()->route('admin.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $types = [
            get_name(FixedValueCoupon::class),
            get_name(PercentOffCoupon::class)
        ];

        return view('admin.coupons.edit', compact('coupon', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponRequest  $request
     * @param  \App\Models\Coupon                      $coupon
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $attributes = $request->validated();

        if ($attributes['type'] !== $coupon->type) {
            // delete old coupon type instance
            $oldCouponTypeInstance = call_user_func($coupon->couponable_type . '::find', $coupon->couponable_id);
            $oldCouponTypeInstance->delete();

            // create new coupon type instance
            $couponTypeClass = 'App\\Models\\' . implode('', explode(' ', $attributes['type']));
            $couponTypeInstance = call_user_func($couponTypeClass . '::create', ['discount' => $attributes['discount']]);

            $coupon->update([
                'code' => $attributes['code'],
                'couponable_id' => $couponTypeInstance->id,
                'couponable_type' => $couponTypeClass
            ]);
        } else {
            $couponTypeInstance = call_user_func($coupon->couponable_type . '::find', $coupon->couponable_id);
            $couponTypeInstance->update(['discount' => $attributes['discount']]);

            $coupon->update(['code' => $attributes['code'],]);
        }

        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Coupon $coupon)
    {
        $couponTypeInstance = call_user_func($coupon->couponable_type . '::find', $coupon->couponable_id);
        $couponTypeInstance->delete();
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('success_message', 'Coupon deleted successfully.');
    }
}
