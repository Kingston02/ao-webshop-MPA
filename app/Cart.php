<?php

namespace App;
use App\Product;

class Cart 
{

    private $items;

    public function __construct(Request $request){
        if($request->session()){
            // Bestaat al
        } else {
            $request->session()->put($items);
            session(['item' => $items]);
        }
    }

}