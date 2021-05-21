<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($id){
        $products = products::all()->where('id', $id);

        return view('products.index', ['products' => $products]);
    }
    public function addToCart($id){
        $product = products::all()->where('id', $id);

        $product_price = $product->price;

        return view('cart.index', ['session' => $product]);
    }
}
