<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{

    public function index()
    {
        /**
         * Getting all the products en categories out of my db
         */
        $products = Product::all();
        $categories = Category::all();

        /**
         * Return to Index view with Products and categories
         */
        return view('index', compact('products', $products), compact('categories', $categories));
    }

    /**
     * addToCart function send request and id
     */
    public function addToCart(Request $request, $productId){
        $product = Products::find($productId);
        $cart =  new Cart($request);
        $cart->addToCart($product, $product->id);
        return redirect()->to('cart');
    }

    /**
     * Get the products 
     */
    public function getCart(Request $request) {
        if (!$request->session()->has('cart')) {
            return view('cart.index', ['products' => null]);
        }
        $cart = new Cart($request);
        $cart->getCart($cart->items, $cart->totalPrice);
        #dd($cart->items);
        return view('cart.index', ['items' => $cart->items, 'priceTot' => $cart->totalPrice]);
    }

    /**
     * Updatecart func
     */
    public function updateCart(Request $request){
        $qty = $request->input('qty');
        $productId = $request->input('productId');
        $cart = new Cart($request);
        $cart->updateCart($productId,$qty);
        return redirect()->to('cart');
    }

    /**
     * removeCart func
     */
    public function removeCart(Request $request, $productId){
        $cart = new Cart($request);
        $cart->removeCart($productId);
        return redirect()->to('cart');
    }
 
    #public function filter($catId){
    #    $cart = new Cart($catId);
    #    $cart->filter($catId);
        
    #    return;
    #}

    
}
