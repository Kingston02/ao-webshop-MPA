<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{

    public function index(Request $request){
        $cart = new Cart($request);
        $sessionData = session()->all();
        #$cart->addToCart($request);
        #$cart->clearCart($request);
        #$cart->getCart($request);
        #print_r($sessionData);
        
        return view('cart.index');
    }

    public function addToCart($request){
        session()->push('items', $request);
        print_r(session()->all());
    }

    public function getCart(){
        
        if(session()){
            $sessionAll = session()->all();
            $sessionItems = $sessionAll['items'];
            print_r($sessionItems);
            #$sessionCount = count($sessionItems);

        }

        $products = products::all()->where('id', 1);
        return view('cart.index', ['items' => $products[0]]);

    }

    #function getItemInfo(){
    #   
    #    $products = products::all()->where('id', 1);
    #    return view('cart.index', ['items' => $products[0]]);
    #    // WHERE moet een Array compleet opzoeken met alle id's ander kan ik maar 1 per keer meesturen.
    #}
    

    public function removeCart($request){

        #delete uit array waar ID hetzelde is als Request
        
    }

}
