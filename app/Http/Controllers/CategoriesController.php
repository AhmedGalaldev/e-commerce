<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{



    public function  getProductsByCategory()
    {

        $products = Category::find(request()->id)->products()->get();

        $categories = Category::all();

        return view('products.productCategories', ['products' => $products, 'categories' => $categories]);
    }
}
