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
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

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
            $data = array(
                'cart'      =>  $cart,
                'transaction_id'   =>   $transaction->id,
                'counts' => $counts
            );
            Mail::to(Auth::user()->email)->send(new InvoiceMail($data));
            Cart::with('products')->where('user_id', Auth::id())->delete();
            $swal = '<script>swal("Success!", "Your order have been paid using your balance!", "success");</script>';
            return redirect('/home')->with('swal', $swal);
        } else{
            $total = $request->input('total');
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->transaction = 'Pending';
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
            $message2 = "Success! Invoice#: $transaction->id";
            $message = "Please go to the cashier and pay Rp $total";
            $swal = "<script>swal('$message2', '$message', 'success');</script>";
            Cart::with('products')->where('user_id', Auth::id())->delete();
            return redirect('/home')->with('swal', $swal);
        }

    }
}
