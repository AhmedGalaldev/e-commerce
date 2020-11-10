<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientInfoRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Products\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::paginate(10);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.products', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }

    public function searchProducts(Request $request)
    {
        $searchText = $request->get('searchProducts');

        $products = Product::where('name', 'like', $searchText)->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.products', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }

    public function addToCart(Request $request, $id)
    {

        $prevCart = $request->session()->get('cart');

        $cart = new Cart($prevCart);
        $product = Product::find($id);

        $cart->addItem($id, $product);

        $request->session()->put('cart', $cart);

        // dump($cart);
        $request->session()->flash('status', 'The product added successfully!');

        return redirect()->route('allProducts');
    }

    public function increaseSingleProduct(Request $request, $id)
    {

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route('showCart');
    }

    public function decreaseSingleProduct(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        if ($cart->items[$id]['quantity'] > 1) {
            $product = Product::find($id);

            $price = (float) str_replace("$", "", $product->price);
            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity'] - 1;
            $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] * $price;

            $cart->updatePriceAndQuantity();
            $request->session()->put('cart', $cart);
        }
        return redirect()->route('showCart');
    }

    public function showCart()
    {
        $cartItems = Session::get('cart');

        if ($cartItems) {
            // dd($cartItems->items);
            return view('products.cart', ['cartItems' => $cartItems]);
        } else {
            return redirect()->route('allProducts');
        }
    }

    public function deleteItemFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart');

        if (array_key_exists($id, $cart->items)) {
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('showCart');
    }

    // cechout products
    public function checkoutProducts()
    {
        return view('products.checkout');
    }

    // create order

    public function createOrder(Request $request, ClientInfoRequest $clientInfoRequest)
    {
        $cart = $request->session()->get('cart');
        if ($cart) {
            $date =  Date('y-m-d h:i:s');
            $first_name = $clientInfoRequest->first_name;
            $last_name  = $clientInfoRequest->last_name;
            $email = $clientInfoRequest->email;
            $address = $clientInfoRequest->address;
            $zip  = $clientInfoRequest->zip;
            $phone = $clientInfoRequest->phone;


            $newOrderArray =  Order::create([
                'status' => 'on_hold', 'date' => $date,
                'del_date' => $date,
                'price' => $cart->totalPrice,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'zip' => $zip
            ]);





            $order_id = DB::getPdo()->lastInsertId();

            foreach ($cart->items as $cart_item) {
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = (float) str_replace('$', '', $cart_item['data']['price']);


                $newItemInCurrentOrder = OrderItem::create([
                    'item_id' => $item_id,
                    'order_id' => $order_id,
                    'item_name' => $item_name,
                    'item_price' => $item_price
                ]);
            };


            // delete session
            $request->session()->forget('cart');

            $payment_info = $newOrderArray;
            $request->session()->put('payment_info', $payment_info);
            return redirect()->route('paymentPage');
        } else {

            return redirect()->route('allProducts');
        }
    }
}
