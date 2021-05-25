<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 29; $i++) {
            Product::create([
                'name' => 'Shoes ' . $i,
                'slug' => 'shoes-' . $i,
                'details' => 'These are great shoes',
                'price' => $i * 1000 + 999,
                'sex_id' => $i % 3 + 1,
                'featured' => $i % 7 > 0 ? 0 : 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach($i % 7 + 1);
        }
    }
}
