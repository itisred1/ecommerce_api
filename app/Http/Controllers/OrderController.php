<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $validateData = $request->validate([
            'products' => 'required|min:1|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);

        $user = $request->user();
        $products = $validateData['products'];

        $total_price = 0;
        foreach ($products as $p) {
            $product = Product::find($p['id']);

            if ($p['quantity'] > $product->stock) {
                return response()->json([
                    'error' => "Not enough stock for product: {$product->name}"
                ], 400);
            }

            $total_price += $product->price * $p['quantity'];
        }

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total_price
        ]);

        foreach ($products as $p) {
            $order->products()->attach($p['id'], ['quantity' => $p['quantity']]);

            $product = Product::find($p['id']);
            $product->stock -= $p['quantity'];
            $product->save();
        }

        return response()->json([
            'message' => 'Order placed successfully',
            'order_id' => $order->id,
            'total_price' => $total_price,
            'products' => $products
        ], 201);
    }
}
