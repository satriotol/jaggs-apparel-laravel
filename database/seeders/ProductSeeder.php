<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $data = ['S', 'M', 'L'];
        foreach ($data as $key => $value) {
            Size::create([
                'name' => $value
            ]);
        };
        for ($i = 0; $i < 4; $i++) {
            $name = $faker->name;
            Product::insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'weight' => random_int(100, 250),
                'description' => $faker->realText(),
                'price' => random_int(100000, 200000),
                'category_id' => random_int(1, 2),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            ProductSize::updateOrCreate(
                [
                    'product_id' => Product::all()->random()->id,
                    'size_id' => Size::all()->random()->id,
                ],
                [
                    'qty' => random_int(10, 50),
                    'status' => 'IN'
                ]
            );
        }
    }
}
