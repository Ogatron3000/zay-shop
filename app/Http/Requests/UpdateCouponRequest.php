<?php

namespace App\Http\Requests;

use App\Models\FixedValueCoupon;
use App\Models\PercentOffCoupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class UpdateCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $couponTypes = [
            'fixedValue' => get_name(FixedValueCoupon::class),
            'percentOff' => get_name(PercentOffCoupon::class),
        ];

        return [
            'code' => 'required|string|max:255|unique:coupons,code,' . $this->coupon->id,
            'type' => 'required|string|in:' . implode(',', array_values($couponTypes)), // implode assoc array
            'discount' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($couponTypes) {
                    if ($this->type === $couponTypes['fixedValue'] && $value < 100) {
                        return $fail($attribute . 'must be larger than 99.');
                    } elseif ($this->type === $couponTypes['percentOff']) {
                        if ($value < 1) {
                            return $fail($attribute . 'must be larger than 0.');
                        } elseif ($value > 99) {
                            return $fail($attribute . 'cannot be larger than 99.');
                        }
                    }
                },
            ],
        ];
    }
}
