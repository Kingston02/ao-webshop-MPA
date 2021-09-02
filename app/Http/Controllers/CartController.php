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
        return view('cart.index');
    }

    public function addToCart($request){
        session()->push('items', $request);
        return view('auth.login');
    }

    public function getCart(){
        $cartItems = [];
        
        if(session()){
            $sessionAll = session()->all();
            $sessionItems = $sessionAll['items'];
            $products = products::whereIn('id', $sessionItems)->get();
        } else {
            $products = null;
        }

        echo $products;
        return view('cart.index', ['items' => $products]);
    }

    public function removeCart($request){
        $sessionAll = session()->all()->remove($request);
        return session()->all();
        #delete uit array waar ID hetzelde is als Request
        
    }

}
