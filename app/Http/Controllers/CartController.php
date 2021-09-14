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
        $keyId = 'itemId'.$request;
        $items = array($keyId=>$request);
        session()->push('items', $items);
        return view('auth.login');
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





    public function removeCart($request){

        #session()->flush();
        
        $sessionAll = session()->all()['items'];

        print_r($sessionAll);

        foreach($sessionAll as $items){
            if($items == $request){

                echo $items;

                session()->forget('name', $request);

                #echo $request;

                #$sessionAll[$request->id]["quantity"] = $request->quantity;
                #echo $items;
                
                #Moet speciefiek verwijder en niet flushe!
                #session()->flush();
                ############
                #$request->session()->forget('items');
            }
        }

        #print_r($arrCount);

        return;

    }
}
