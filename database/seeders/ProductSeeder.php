<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Electronics
        Product::create([
            'name' => 'Laptop',
            'price' => 1200,
            'stock' => 10,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Smartphone',
            'price' => 800,
            'stock' => 15,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Tablet',
            'price' => 500,
            'stock' => 20,
            'category_id' => 1,
        ]);

        // Accessories
        Product::create([
            'name' => 'Mouse',
            'price' => 25,
            'stock' => 50,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Keyboard',
            'price' => 45,
            'stock' => 30,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Headphones',
            'price' => 60,
            'stock' => 25,
            'category_id' => 2,
        ]);

        // Furniture
        Product::create([
            'name' => 'Office Chair',
            'price' => 150,
            'stock' => 10,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Desk',
            'price' => 250,
            'stock' => 5,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Bookshelf',
            'price' => 120,
            'stock' => 8,
            'category_id' => 3,
        ]);
    }
}
