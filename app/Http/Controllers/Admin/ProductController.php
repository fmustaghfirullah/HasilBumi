<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        // Eager load relationships for efficiency
        $products = Product::with(['category', 'seller'])->get();
        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
        ]);
    }
}
