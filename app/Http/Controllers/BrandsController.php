<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function  getProductsByBrand()
    {
        $products = Brand::find(request()->id)->products()->get();

        $brands = Brand::all();

        return view('products.productBrands', ['products' => $products, 'brands' => $brands]);
    }
}
