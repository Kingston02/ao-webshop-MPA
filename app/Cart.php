<?php

namespace App;
use App\Product;

class Cart 
{

    private $session;

    public function __construct($request){
        $this->session = $request->session();
    }

    public function getSession($request){
        $sessionItems = $request->session()->all();

        return $sessionItems;

    }

    public function addToCart($request){
        $request->session()->push('items', 'testItem');
    }


    public function refreshCart($request){
        $request->session()->flush();
    }


}

