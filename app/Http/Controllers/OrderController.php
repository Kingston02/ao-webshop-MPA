<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * order submit function stores the order in the DB and redirect to orderPlaced page
     */
    public function orderSubmit(Request $request){
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->save();

        $request->session()->forget('cart');

        return redirect()->route('product')->with(Session::flash('success', 'Payment successful!'));
    }
}
