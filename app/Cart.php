<?php
namespace App;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class Cart
{

    private $session;
    public $sessionItems = [];
    public $sessionQty = 0;
    public $totalPrice = 0;

    public function __construct(Request $request)
        //constructor to set all values
    {

        if($request->session()->has('cart') == True){
            $oldCart = $request->session()->get('cart');
        } else {
            $oldCart = null;
        }

        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
        #$this->save();
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