<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Product;
use App\Rate;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if (Auth::user()->admin == 0){
            $cart = Cart::with('products')->where('user_id', Auth::id())->get();
            $categories = Categories::all();
            $rates = Rate::all()->toArray();
            $data = DB::table('products')->paginate(6);
            $gallery = Product::all()->random(6);
            $counts = Cart::with('products')->where('user_id', Auth::id())->count();
            return view('home', compact('cart'))->with('categories', $categories)->with('rates', $rates)->with('data', $data)->with('gallery', $gallery)->with('counts', $counts);
        } else {
            $users = User::all();
            $user_count = User::where('admin', 0)->count();
            $categories = Categories::all();
            $product_count = Product::all()->count();
            $transaction_count = Transaction::all()->count();
            $products = Product::with('categories')->paginate(6);
            $income = Transaction::all();
            return view('admin.home', $users)->with('products', $products)->with('user_count', $user_count)->with('product_count', $product_count)->with('transaction_count', $transaction_count)->with('categories', $categories)->with('income', $income);
        }
    }

    public function removemenu (Request $request){
        if ($request->ajax()){
            $query = $request->get('id');
            Product::where('id', $query)->delete();
        }
    }

    public function addmenu(Request $request){
            $input = $request->all();
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $input['image']);
            $cat_id = $request->input('cat-new');
            $title = $request->input('title-new');
            $price = $request->input('price-new');
            $description = $request->input('desc-inp');
            $product = new Product();
            $product->cat_id = $cat_id;
            $product->brand_id = 1;
            $product->title = $title;
            $product->price = $price;
            $product->description = $description;
            $product->image = $input['image'];
            $product->keyword = $title;
            $product->save();
        $users = User::all();
        $user_count = User::where('admin', 0)->count();
        $categories = Categories::all();
        $product_count = Product::all()->count();
        $transaction_count = Transaction::all()->count();
        $products = Product::with('categories')->paginate(6);
        $income = Transaction::all();
        $income += $income->amount;
        return view('admin.home', $users)->with('products', $products)->with('user_count', $user_count)->with('product_count', $product_count)->with('transaction_count', $transaction_count)->with('categories', $categories)->with('income', $income);
    }

    public function special(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('id');
            Product::where('special', 1)->update( array('special'=>0) );
            $product = Product::where('id', $query)->update( array('special'=>1));
        }
    }

    public function fetch_data(Request $request){
        if($request->ajax())
        {
            $data = DB::table('products')->paginate(6);
            return view('products', compact('data'))->render();
        }
    }

    public function action(Request $request){
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('products')->where('keyword', 'like', '%' .$query. '%')->orWhere('description', 'like', '%' .$query. '%')->paginate(6);
                return view('products', compact('data'))->render();
            } else {
                $data = DB::table('products')->paginate(6);
                return view('products', compact('data'))->render();
            }
        }
    }

    public function deletefromcart(Request $request){
        if($request->ajax()){
            $query = $request->get('id');
            $product = Cart::where('product_id', $query)->where('user_id', Auth::id());
            if($product->delete()){
                $cart = Cart::with('products')->where('user_id', Auth::id())->get();
                $counts = Cart::with('products')->where('user_id', Auth::id())->count();
                return view('cart', compact('cart'))->with('counts', $counts)->render();
            }
        }
    }

    public function addtocart(Request $request){
        if($request->ajax()){
            $query = $request->get('id');
            $exist = Cart::where('product_id', $query)->where('user_id', Auth::id())->first();
            if(is_null($exist)){
                $cart = new Cart();
                $cart->product_id = $query;
                $cart->user_id = Auth::id();
                $cart->qty = 1;
                $cart->save();
            }else{
                $exist->qty;
                Cart::where('product_id', $query)->where('user_id', Auth::id())->update( array('qty'=>$exist->qty+1) );
            }
        }
        $cart = Cart::with('products')->where('user_id', Auth::id())->get();
        $counts = Cart::with('products')->where('user_id', Auth::id())->count();
        return view('cart', compact('cart'))->with('counts', $counts)->render();
    }

    public function categories(Request $request){
        if($request->ajax()){
            $query = $request->get('query');
                $data = DB::table('products')->where('cat_id', $query)->paginate(6);
                return view('products', compact('data'))->render();
        }
    }
}
