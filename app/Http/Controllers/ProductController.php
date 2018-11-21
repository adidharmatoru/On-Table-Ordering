<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Product;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($prod_name){
        $cart = Cart::with('products')->where('user_id', Auth::id())->get();
        $categories = Categories::all();
        $rates = Rate::all()->toArray();
        $data = DB::table('products')->paginate(6);
        $gallery = Product::all()->random(6);
        $counts = Cart::with('products')->where('user_id', Auth::id())->count();
        $products = Product::all()->where('title', $prod_name)->first();
        $rate = Rate::with('products')->with('users')->get();
        return view('rating', compact('cart'))->with('categories', $categories)->with('rates', $rates)->with('data', $data)->with('gallery', $gallery)->with('counts', $counts)->with('products', $products);
    }

    public function rate(Request $request){
        $rate = new Rate();
        $rate->product_id = $request->prod_id;
        $rate->user_id = Auth::user()->id;
        $rate->rate = $request->rating;
        $rate->comment = $request->comment;
        $rate->save();
        return redirect('/home');
    }
}
