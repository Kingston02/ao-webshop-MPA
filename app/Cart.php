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
        $this->session = session()->all();
    }

    public function addToCart($id){
        session()->push('items', $id);
    }

    public function removeCart($id){
        
        #session()->flush();
        

        print_r(session()->all());
        return;
    }

    public function updateCart($id){
        #update aantal
    }

}