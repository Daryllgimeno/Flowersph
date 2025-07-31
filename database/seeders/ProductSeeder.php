<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

$flowers = [

    'Rosas', 'Sampaguita', 'Sunflower', 'Daisy', 'Tulip',
    'Orchid', 'Carnation', 'Lily', 'Jasmine', 'Dandelion',
    'Lavender', 'Gumamela', 'Hibiscus', 'Santan',
    'Peony','Ranunculus','Hydrangea','Chrysanthemum','Anemone','Calla Lily','Freesia','Alstroemeria','Gardenia','Baby’s Breath','Protea',
    'Sweet Pea','Lisianthus','Delphinium',
];


        $i = 0;

while ($i < 20) {
    Product::create([
        'product_name' => $flowers[array_rand($flowers)],
                'product_description' => fake()->sentence(),
                'quantity' => fake()->numberBetween(1, 100),
                'price' => fake()->randomFloat(2, 50, 500),
    ]);
    $i++;
}

    }
}
