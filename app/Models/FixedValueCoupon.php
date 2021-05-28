<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedValueCoupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function coupon()
    {
        return $this->morphOne(Coupon::class, 'couponable');
    }

    public function discount($total)
    {
        return $this->discount;
    }

    public function presentDiscount()
    {
        return present_price($this->discount);
    }
}
