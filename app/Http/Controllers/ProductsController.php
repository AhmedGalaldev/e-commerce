<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.products', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }
}
