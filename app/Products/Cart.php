<?php

namespace App\Products;

class Cart
{
    public $items;
    public $totalQauntity;
    public $totalPrice;

    public function __construct($prevCart)
    {
        if ($prevCart != null) {
            $this->items = $prevCart->items;
            $this->totalQauntity = $prevCart->totalQauntity;
            $this->totalPrice = $prevCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQauntity = 0;
            $this->totalPrice = 0;
        }
    }


    public function addItem($id, $product)
    {

        $price = (float) str_replace("$", "", $product->price);

        if (array_key_exists($id, $this->items)) {

            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
            $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
        } else {
            $productToAdd = ['quantity' => 1, 'totalSinglePrice' => $price, 'data' => $product];
        }

        $this->items[$id] = $productToAdd;
        $this->totalQauntity++;
        $this->totalPrice = $this->totalPrice + $price;
    }



    public function updatePriceAndQuantity()
    {
        $totalPrice = 0;
        $totalQauntity = 0;
        foreach ($this->items as $item) {
            $totalQauntity += $item['quantity'];
            $totalPrice += $item['totalSinglePrice'];
        }

        $this->totalPrice = $totalPrice;
        $this->totalQauntity = $totalQauntity;
    }
}
