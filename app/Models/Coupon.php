<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTypeAttribute()
    {
        return get_name($this->couponable_type);
    }

    public function getDiscountAttribute()
    {
        $couponTypeInstance = call_user_func($this->couponable_type . '::find', $this->couponable_id);

        return $couponTypeInstance->discount;
    }

    public function presentDiscount()
    {
        $couponTypeInstance = call_user_func($this->couponable_type . '::find', $this->couponable_id);

        return $couponTypeInstance->presentDiscount();
    }

    public static function findByCode($code)
    {
        return self::where('code', $code);
    }

    public function couponable()
    {
        return $this->morphTo();
    }
}
