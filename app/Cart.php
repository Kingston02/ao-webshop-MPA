<?php
namespace App;
use App\Product;
use App\Products;
use Illuminate\Http\Request;

class Cart
{
    public $items = [];
    public $sessionQty = 0;
    public $totalPrice = 0;

    /**
     * Check if the session. Check if cart array/items in session. If so, get items and store localluy in the cart, if not initialize ewmtpy local storage.
     */
    public function __construct(Request $request)
        //constructor to set all values
    {
        #session()->flush();
        #dd($request->session());
        if($request->session()->has('cart') == True){
            
            $oldCart = $request->session()->get('cart');
            
        } else {
            $oldCart = null;
        }
        
        if ($oldCart) {
            #session()->flush();
            #dd($oldCart);
            $this->items = $oldCart->items;
            $this->sessionQty = $oldCart->sessionQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
        
        $this->save();
    }
    

    /**
     * Save func 
     */
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
        $this->sessionQty++;
        $this->totalPrice += $item->price;

        $this->save();
        
    }

    public function removeCart($productId){
        
        session()->flush();
        
        print_r(session()->all());
        return;
    }

    public function getCart($itemsId, $totalPrice){

        if(count($itemsId) > 0){
            #dd(array_keys($itemsId));
            $productIdArr = [];
            foreach(array_keys($itemsId) as $productId){
                array_push($productIdArr, $productId);
            }
            #dd($productIdArr);
            $products = Product::whereIn('id', $productIdArr)->get();
            #dd($products);
        } else {
            return view('home');
        }

        return ['items' => $products, 'priceTot' => $totalPrice];
    }

    public function updateCart($productId, $qty){
        
    }

}