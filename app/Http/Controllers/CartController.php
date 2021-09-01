<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    public function index(Request $request){
        $cart = new Cart($request);
        $cart->addToCart($request);
        #$cart->clearCart($request);
        #$cart->getCart($request);
        print_r($sessionData);
        
        return view('cart.index');
    }

    public function addToCart($request){
        session()->push('items', $request);
        print_r(session()->all());
    }

    public function getCart($request){
        
        if(session()){
            $sessionItems = session()->all();
            print_r($sessionItems);
            $sessionCount = count($sessionData['products']);
            return 'er zijn'.$sessionCount.' producten gevonden';
        }

        return $sessionItems['url'];

    }

}
