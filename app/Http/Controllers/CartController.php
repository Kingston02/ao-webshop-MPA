<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{

    public function index($productId){
        $cart = new Cart($productId);
        //$sessionData = session()->all();   
        $cartItems = $cart->getCartItems();     
        return view('cart.index', ['items' => $cartItems]);
    }

    public function addToCart(Request $request, $productId){
        $product = Products::find($productId);
        $cart =  new Cart($request);
        $cart->addToCart($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function getCart(){
        $cart = new Cart();
        $products = $cart->getCart();
        return view('cart.index', ['items' => $products, 'priceTot' => $priceTot]);
    }

    public function updateCart($productId){
        $cart = new Cart($productId);
        $cart->updateCart($productId);
        return redirect()->route('home');
    }

    public function removeCart($productId){
        $cart = new Cart($productId);
        $cart->removeCart($productId);

        return;
        
        #return redirect()->route('home');

    }

    
}
