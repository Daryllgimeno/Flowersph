<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'first_name'     => fake()->firstName(),
                'last_name'      => fake()->lastName(),
                'email_address'  => fake()->unique()->safeEmail(),
                'mobile_number'  => fake()->phoneNumber(),
                'address'        => fake()->address(),
                'status'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
