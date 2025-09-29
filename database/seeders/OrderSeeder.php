<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $products = Product::take(2)->get();

        $total_price = 0;

        foreach ($products as $product) {
            $total_price += $product->price * 1; // quantity = 1
        }

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total_price
        ]);

        foreach ($products as $product) {
            $order->products()->attach($product->id, ['quantity' => 1]);

            $product->decrement('stock', 1);
        }
    }
}
