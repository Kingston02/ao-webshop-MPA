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

    public function getCart($request){
        $sessionItems = $request->session()->all();
        $sessionCount = count($sessionData['products']);
        echo 'er zijn'.$sessionCount.' producten gevonden';

        //return $sessionData;

        return $sessionItems;

    }

    public function addToCart($request){
        $request->session()->push('items', 'testItem');
    }


    public function refreshCart($request){
        $request->session()->flush();
    }


}

