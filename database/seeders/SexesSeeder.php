<?php

namespace Database\Seeders;

use App\Models\Sex;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SexesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Sex::insert([
            ['name' => 'Male', 'slug' => 'male', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Female', 'slug' => 'female', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Unisex', 'slug' => 'unisex', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
