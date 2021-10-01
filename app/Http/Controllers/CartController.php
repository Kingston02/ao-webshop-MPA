<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{

    /**
     * addToCart function send request and productId
     */
    public function addToCart(Request $request, $productId){
        $product = Products::find($productId);
        $cart =  new Cart($request);
        $cart->addToCart($product, $product->id);
        return redirect()->to('cart');
    }

    /**
     * getCart function get the products en return them with view to the cart
     */
    public function getCart(Request $request) {
        if (!$request->session()->has('cart')) {
            return view('cart.index', ['products' => null]);
        }
        $cart = new Cart($request);
        $cart->getCart($cart->items, $cart->totalPrice);
        return view('cart.index', ['items' => $cart->items, 'priceTot' => $cart->totalPrice]);
    }

    /**
     * Updatecart function uppdates the qty of a product
     */
    public function updateCart(Request $request){
        $qty = $request->input('qty');
        $productId = $request->input('productId');
        $cart = new Cart($request);
        $cart->updateCart($productId,$qty);
        return redirect()->to('cart');
    }
    
    /**
     * removeCart function removes a specifically product trough the product id 
     */
    public function removeCart(Request $request, $productId){
        $cart = new Cart($request);
        $cart->removeCart($productId);
        return redirect()->to('cart');
    }
}