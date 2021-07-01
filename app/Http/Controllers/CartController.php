<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    public function index(Request $request){
        $cart = new Cart($request);
        //$cart->addToCart($request);
        //$cart->clearCart($request);]
        $cart->getCart($request);
        print_r($sessionData);
        
        return view('cart.index');
    }

    public function getCart($request){
        
        if($request->session()){
            print_r($request->session()->all());
            $sessionItems = $request->session()->all();
            $sessionCount = count($sessionData['products']);
            echo 'er zijn'.$sessionCount.' producten gevonden';
        }

        //return $sessionData;

        return $sessionItems;

    }

}
