<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('admin.index', ['products' => $products]);
    }

    public function create()
    {

        $products =  Product::all();
        return view('admin.create', compact('products'));
    }

    public function store(ProductRequest $productRequest)
    {



        $product = Product::create([
            'name' => $productRequest->name,
            'description' => $productRequest->description,
            'SKE' => $productRequest->SKE,
            'price' => $productRequest->price
        ]);


        $this->storeImage($product);
        return redirect('admin/products');
    }

    public function edit($product)
    {


        return view('admin.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $productRequest)
    {

        $product->update([$productRequest]);
        $this->storeImage($product);

        return redirect('admin/products' . $product->id);
    }
    public function destroy(Product $product)
    {
        $product->delete();

        Storage::delete('public/' . $product->image);

        return redirect('admin/products');
    }

    public function storeImage($products)
    {
        if (request()->has('image')) {


            $products->update([
                'image' => request()->image->store('images', 'public')
            ]);

            $image = Image::make(public_path('storage/' . $products->image))->fit('300', '300');
            $image->save();
        }
    }
}
