<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['PANTS', 'T-SHIRT', 'SHIRT', 'JACKET'];
        foreach ($data as $key => $value) {
            ProductCategory::insert([
                'name' => $value,
            ]);
        }
    }
}
