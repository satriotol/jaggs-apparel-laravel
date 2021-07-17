<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $firstname = $faker->firstName;
        Transaction::insert([
            'uuid' => 'JAGGS' . mt_rand(10000, 100000),
            'name' => $firstname,
            'email' => $firstname . '@gmail.com',
            'address' => $faker->address,
            'number' => $faker->e164PhoneNumber,
            'transaction_total' => 0,
            'transaction_status' => 'PENDING'
        ]);
    }
}
