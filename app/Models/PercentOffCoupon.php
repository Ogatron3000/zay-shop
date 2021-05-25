<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentOffCoupon extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->morphOne(Coupon::class, 'couponable');
    }

    public function discount($total)
    {
        return $total * $this->percent / 100;
    }
}
