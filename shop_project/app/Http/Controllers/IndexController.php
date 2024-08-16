<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('is_published', 1)->get();
        
        return view('index', compact('products'));
    }
}
