<?php

namespace Database\Seeders;

use App\Models\FixedValueCoupon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FixedValueCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        FixedValueCoupon::insert([
            ['value' => 500, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
