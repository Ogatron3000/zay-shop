<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'featured' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Running', 'slug' => 'running', 'featured' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Outdoor', 'slug' => 'outdoor', 'featured' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Football', 'slug' => 'football', 'featured' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Basketball', 'slug' => 'basketball', 'featured' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tennis', 'slug' => 'tennis', 'featured' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gym', 'slug' => 'gym', 'featured' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
