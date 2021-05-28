<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentOffCoupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function coupon()
    {
        return $this->morphOne(Coupon::class, 'couponable');
    }

    public function discount($total)
    {
        return $total * $this->discount / 100;
    }

    public function presentDiscount()
    {
        return $this->discount . ' %';
    }
}
