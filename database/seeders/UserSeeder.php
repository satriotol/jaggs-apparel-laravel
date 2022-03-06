<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@admin.com')->first();
        if ($user === null) {
            User::insert([
                'name' => "satrio",
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin')
            ]);
        }
    }
}
