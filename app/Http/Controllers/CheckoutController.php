<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Order;
use App\Product;
use App\Rate;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(){
        $cart = Cart::with('products')->where('user_id', Auth::id())->get();
        $categories = Categories::all();
        $rates = Rate::all()->toArray();
        $data = DB::table('products')->paginate(6);
        $gallery = Product::all()->random(6);
        $counts = Cart::with('products')->where('user_id', Auth::id())->count();
        return view('checkout', compact('cart'))->with('categories', $categories)->with('rates', $rates)->with('data', $data)->with('gallery', $gallery)->with('counts', $counts);
    }

    public function payment(Request $request){
        $cart = Cart::with('products')->where('user_id', Auth::id())->get();
        $categories = Categories::all();
        $rates = Rate::all()->toArray();
        $data = DB::table('products')->paginate(6);
        $gallery = Product::all()->random(6);
        $counts = Cart::with('products')->where('user_id', Auth::id())->count();
        $total = $request->input('total');
        if($request->input('paymentMethod') == 'balance'){
            $balance = Auth::user()->balance;
            $new_balance = $balance - $total;
            Auth::user()->update( array('balance'=>$new_balance) ) ;
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->transaction = 'Checkout';
            $transaction->amount = $total;
            $transaction->save();
            foreach ($cart as $cr){
                $order = new Order();
                $order->transaction_id = $transaction->id;
                $order->product_id = $cr->product_id;
                $order->user_id = Auth::id();
                $order->qty = 1;
                $order->save();
            }
            Cart::with('products')->where('user_id', Auth::id())->delete();
            return redirect('/home');
        } elseif ($request->input('paymentMethod') == 'cashier'){

        } else{

        }

    }
}
