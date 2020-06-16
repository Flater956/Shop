<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(8);
        return view('index', compact('products'));
    }

    public function category($category_code)
    {
        $category = Category::where('code', $category_code)->first();
        $products=$category->products()->paginate(8);
        return view('category', compact('products','category'));
    }

    public function product($category, $product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return view('product', compact('product'));
    }

    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
}

