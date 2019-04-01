<?php

use Faker\Generator;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Product::truncate();
        for($i = 0; $i < 30; $i++) {
            $product_name = $faker->sentence(2);
            Product::create([
                'product_name' => $product_name,
                'slug' => $product_name,
                'comment' => $faker->sentence(20),
                'price' => $faker->randomFloat(3,1,20)
            ]);
        }
    }
}
