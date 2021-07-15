<?php

namespace Database\Seeders;

use App\Models\Age;
use Illuminate\Database\Seeder;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Age::insert([
            'name' => 'ANAK'
        ]);
        Age::insert([
            'name' => 'DEWASA'
        ]);
    }
}
