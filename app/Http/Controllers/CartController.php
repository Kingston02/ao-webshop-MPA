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
        $priceArr = [];
        $priceTot = 0;
        
        if(session()){
            $sessionAll = session()->all();
            $sessionItems = $sessionAll['items'];
            $products = products::whereIn('id', $sessionItems)->get();
        } else {
            $products = null;
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
        $arrCount = -1;
        $sessionAll = session()->all()['items'];

        foreach($sessionAll as $items){
            $arrCount+=1;
            print_r($arrCount);
            if($items == $request){
                
                #Moet speciefiek verwijder en niet flushe!
                session()->flush();
                ############

                $idtje = $items;
            }
        }

        #print_r($idtje);
        #print_r($arrCount);

        return;

    }
}
