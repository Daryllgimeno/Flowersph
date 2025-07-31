<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = [
            ['id' => 1, 'product_name' => 'Gumamela', 'price' => 150],
            ['id' => 2, 'product_name' => 'Carnation', 'price' => 200],
            ['id' => 3, 'product_name' => 'Orchid ', 'price' => 200],
        ];

        $total = collect($orders)->sum('price');

        return view('orders.index', compact('orders', 'total'));
    }
}
