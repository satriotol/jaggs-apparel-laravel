<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        About::insert([
            'description' => $faker->realText(),
        ]);
    }
}
