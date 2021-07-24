<?php

namespace Database\Seeders;

use App\Models\Product;
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
    }
}
