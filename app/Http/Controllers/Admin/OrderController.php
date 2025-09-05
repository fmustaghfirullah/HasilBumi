<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        // Eager load order items count for efficiency
        $orders = Order::withCount('order_items')->latest()->get();
        return Inertia::render('Admin/Orders/Index', [
            'orders' => $orders,
        ]);
    }
}
