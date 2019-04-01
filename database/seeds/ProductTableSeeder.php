<?php

use Faker\Generator;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;
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
        ProductDetail::truncate();


        for($i = 0; $i < 30; $i++) {
            $product_name = $faker->sentence(2);
            $product = Product::create([
                'product_name' => $product_name,
                'slug' => $product_name,
                'comment' => $faker->sentence(20),
                'price' => $faker->randomFloat(3,1,20)
            ]);

            $detail = $product->detail()->create([
                'show_slider'=>rand(0,1),
                'show_opportunity'=>rand(0,1),
                'show_featured'=>rand(0,1),
                'show_bestselling'=>rand(0,1),
                'show_reduced'=>rand(0,1)
            ]);
        }


    }
}
