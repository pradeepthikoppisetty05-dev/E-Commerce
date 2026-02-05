<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    
    public function index()
    {
        $categories = Category::with('products')->get();
        
        $featuredProducts = Product::with('category')->latest()->take(8)->get();
        
        return view('Home.index', compact('categories', 'featuredProducts'));
    }
}
