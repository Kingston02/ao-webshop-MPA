<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class CartController extends Controller
{

    public function index()
    {
        //Getting all the products that I created in my seeder, from my database
        $products = Product::all();
        $categories = Category::all();

        // return view('index', [compact('products', $products), compact('categories', $categories)]);
        return view('index', compact('products', $products), compact('categories', $categories));
        // return view('index', compact('categories', $categories));
    }

    public function addToCart(Request $request, $productId){
        $product = Products::find($productId);
        $cart =  new Cart($request);
        $cart->addToCart($product, $product->id);
        $request->session()->put('cart.index', $cart);
        return redirect()->route('home');
    }

    public function getCart(Request $request) {
        if (!$request->session()->has('cart')) {
            return view('cart', ['products' => null]);
        }
        $cart =  new Cart($request);
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
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
