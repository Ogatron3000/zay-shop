<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\FixedValueCoupon;
use App\Models\PercentOffCoupon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(SexesSeeder::class);
        $this->call(FixedValueCouponSeeder::class);
        $this->call(PercentOffCouponSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
