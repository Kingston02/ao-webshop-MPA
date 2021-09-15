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

    public function addToCart($id){
        $cart = new Cart($id);
        $cart->addToCart($id);
        return redirect()->route('home');
    }

    public function getCart(){

        $cartItems = [];
        $priceArr = [];
        $priceTot = 0;
        
        if(session()){
            $sessionAll = session()->all();
            $sessionItems = $sessionAll['items'];
            $products = products::whereIn('id', $sessionItems)->get();
        } else {
            return view('auth.login');
        }
        foreach($products as $item){
            array_push($priceArr, $item['price']);
        }
        foreach($priceArr as $price){
            $priceTot += $price;
        }

        return view('cart.index', ['items' => $products, 'priceTot' => $priceTot]);
    }

    public function updateCart($id){
        $cart = new Cart($id);
        $cart->updateCart($id);
        return redirect()->route('home');
    }

    public function removeCart($id){

        $cart = new Cart($id);
        $cart->removeCart($id);

        return;
        
        #return redirect()->route('home');

    }

    
}
