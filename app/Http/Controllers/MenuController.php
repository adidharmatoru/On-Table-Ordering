<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Product;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $cart = Cart::with('products')->where('user_id', Auth::id())->get();
        $categories = Categories::all();
        $rates = Rate::all()->toArray();
        $data = DB::table('products')->paginate(6);
        $gallery = Product::all()->random(6);
        $snack = Product::all()->where('cat_id', 2);
        $main = Product::all()->where('cat_id', 1);
        $dessert = Product::all()->where('cat_id', 3);
        $beverage = Product::all()->where('cat_id', 4);
        $counts = Cart::with('products')->where('user_id', Auth::id())->count();
        return view('menu', compact('cart'))->with('categories', $categories)->with('rates', $rates)->with('data', $data)->with('gallery', $gallery)->with('counts', $counts)->with('snack', $snack)->with('main', $main)->with('dessert', $dessert)->with('beverage', $beverage);
}
}
