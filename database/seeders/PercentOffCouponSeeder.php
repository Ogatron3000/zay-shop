<?php

namespace Database\Seeders;

use App\Models\FixedValueCoupon;
use App\Models\PercentOffCoupon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PercentOffCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        PercentOffCoupon::insert([
            ['discount' => 50, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
