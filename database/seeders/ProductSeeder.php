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
        Product::create([
            'name' => 'Shoes 1',
            'slug' => 'shoes-1',
            'details' => 'Running Shoes',
            'price' => 24999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 2',
            'slug' => 'shoes-2',
            'details' => 'Basketball Shoes',
            'price' => 14999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 3',
            'slug' => 'shoes-3',
            'details' => 'Running Shoes',
            'price' => 34999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 4',
            'slug' => 'shoes-4',
            'details' => 'Lifestyle Shoes',
            'price' => 44999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 5',
            'slug' => 'shoes-5',
            'details' => 'Running Shoes',
            'price' => 19999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 6',
            'slug' => 'shoes-6',
            'details' => 'Football Shoes',
            'price' => 24999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 7',
            'slug' => 'shoes-7',
            'details' => 'Football Shoes',
            'price' => 29999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 8',
            'slug' => 'shoes-8',
            'details' => 'Running Shoes',
            'price' => 4999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'Shoes 9',
            'slug' => 'shoes-9',
            'details' => 'Basketball Shoes',
            'price' => 24999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);
    }
}
