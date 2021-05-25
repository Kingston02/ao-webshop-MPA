<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{
    public function index($id){
        $product = product::all()->where('id', $id);

        return view('cart.index', ['products' => $product]);
    }

    /*public function addToCart($id){
        $product = products::all()->where('id', $id);

        $product_price = $product;

        return view('cart.index', ['session' => $product]);
    }*/

    public function getCart(Request $request){
        $cart = $request->session()->all();
        return view('cart.index', ['session' => $cart]);
    }




}
