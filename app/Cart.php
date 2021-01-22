<?php

namespace App;

class Cart
{
    private $items = [];

    public function __construct(){


        if( ! session()->has('cart')){
            // maak nieuwe cart
            session(['cart' => [] ]);
            session()->save();
        } else {
            $this->items = session('cart');
        }

        #dd(session()->all());
        
    }
}
