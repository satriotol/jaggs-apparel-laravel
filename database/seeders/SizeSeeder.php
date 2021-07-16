<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['S', 'M', 'L', 'XL'];
        foreach ($data as $key => $value) {
            Size::insert([
                'name' => $value
            ]);
        }
    }
}
