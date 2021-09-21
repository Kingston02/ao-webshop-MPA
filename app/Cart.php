<?php
namespace App;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class Cart
{
    public $sessionItems = [];
    public $sessionQty = 0;
    public $totalPrice = 0;

    /**
     * Check if the session. Check if cart array/items in session. If so, get items and store localluy in the cart, if not initialize ewmtpy local storage.
     */
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
        
        $this->save();
    }

    public function save() {
        //function to save cart
        if (count($this->items) > 0) {
            session()->put('cart', $this);
        } else {
            session()->forget('cart');
        }
    }

    public function addToCart($item, $productId){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($productId, $this->items)) {
                $storedItem = $this->items[$productId];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$productId] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function removeCart($productId){
        
        #session()->flush();
        
        print_r(session()->all());
        return;
    }

    public function getCart(){
        $cartItems = [];
        $priceArr = [];
        $priceTot = 0;
        
        if(session()){
            $sessionAll = session()->all();
            $sessionItems = $sessionAll['items'];
            $products = Product::whereIn('id', $sessionItems)->get();
        } else {
            return view('auth.login');
        }
        foreach($products as $item){
            array_push($priceArr, $item['price']);
        }
        foreach($priceArr as $price){
            $priceTot += $price;
        }
        return $products;
    }

    public function updateCart($productId){
        #update aantal
    }
    
    private function pushToSession($productId){

    }

}