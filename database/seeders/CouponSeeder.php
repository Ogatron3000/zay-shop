<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\FixedValueCoupon;
use App\Models\PercentOffCoupon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Coupon::insert([
            ['code' => 'BRINGITHOME', 'couponable_id' => 1, 'couponable_type' => FixedValueCoupon::class, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'RUNFORRESTRUN', 'couponable_id' => 1, 'couponable_type' => PercentOffCoupon::class, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
