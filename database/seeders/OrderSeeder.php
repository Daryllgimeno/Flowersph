<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $i = 0;

while ($i < 10) {
    Order::create([
        'user_id' => User::inRandomOrder()->first()->id,
        'product_id' => Product::inRandomOrder()->first()->id,
        'price' => fake()->randomFloat(2, 100, 1000),
    ]);
    $i++;
}
    }
}
