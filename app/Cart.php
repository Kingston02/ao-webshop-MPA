<?php

namespace App;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class Cart 
{

    private $session;

    public function __construct($request){
        $this->session = $request->session();
    }

    public function addToCart($request){

        $keyId = 'itemId'.$request;
        $items = array($keyId=>$request);
        session()->push('items', $items);
        
    }


    public function removeCart($request){
        $request->session()->flush();
    }


}

