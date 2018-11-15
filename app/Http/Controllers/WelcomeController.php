<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Rate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
        $gallery = Product::all()->random(6);
        $special = Product::all()->where('special', 1)->first();
        $rate = Rate::with('products')->with('users')->get();
        $time = Carbon::now()->format('D, d-M-Y');
        $hour = Carbon::now()->format('H');
        return view('welcome', compact('gallery'))->with('rate', $rate)->with('special', $special)->with('time', $time)->with('hour', $hour);
    }
}
