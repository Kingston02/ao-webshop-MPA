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
        $request->session()->put('cart.index', $cart);
        return redirect()->route('home');
    }

    /**
     * Get the products 
     */
    public function getCart(Request $request) {
        if (!$request->session()->has('cart')) {
            return view('cart.index', ['products' => null]);
        }
        $cart =  new Cart($request);
        return view('cart.index', ['items' => $cart->items, 'priceTot' => $cart->totalPrice]);
    }

    /**
     * Updatecart func
     */
    public function updateCart($productId){
        $cart = new Cart($productId);
        $cart->updateCart($productId);
        return redirect()->route('home');
    }

    /**
     * removeCart func
     */
    public function removeCart($productId){
        $cart = new Cart($productId);
        $cart->removeCart($productId);

        return;
        #return redirect()->route('home');

    }

    
}
